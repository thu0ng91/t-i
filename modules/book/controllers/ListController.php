<?php
/**
 * 小说分类
 * Class ListController
 */
class ListController extends FWModuleFrontController
{

    /**
     * 过滤器
     * 添加透明缓存
     * @return array
     */
    public function filters() {
        $ret = array();
        if ($this->siteConfig && $this->siteConfig->SiteIsUsedCache && $this->module->cacheConfig && ($this->module->cacheConfig->BookIsCache == 1)) {
            $ret[] = array (
                'FWOutputCache + index',
                'duration' => $this->module->cacheConfig->BookCategoryCacheTime,
                'varyByParam' => array('title', 'page'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> 'book-category-index' . (isset($_GET['title']) ? $_GET['title'] : ''),
            );
            $ret[] = array (
                'FWOutputCache + rank',
                'duration' => $this->module->cacheConfig->BookRankCacheTime,
                'varyByParam' => array('page'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> 'book-rank',
            );
            $ret[] = array (
                'FWOutputCache + lastupdate',
                'duration' => $this->module->cacheConfig->BookLastupdateCacheTime,
                'varyByParam' => array('page'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> 'book-lastupdate',
            );
        }

        return $ret;
    }
    /**
     * 分类首页
     * @throws CHttpException
     */
    public function actionIndex()
    {
        $category = null;
        if (isset($_GET['title']) && is_string($_GET['title'])) {
            $category = Category::model()->find('shorttitle=:title', array(
              ':title' => $_GET['title']
            ));
        } elseif (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $category = Category::model()->findByPk($_GET['id']);
        }

        if (!$category) {
            throw new CHttpException(404);
        }

        $criteria = new CDbCriteria();
        $criteria->compare("cid", $category->id);
        $criteria->compare("status", Yii::app()->params['status']['ischecked']);

        $criteria->order = "lastchaptertime desc";

        $count=Book::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
    	if(empty($tempconf->PageShowNums)){
			$showNums = 30;
		}else{
			$showNums = $tempconf->PageShowNums;
		}
        $pages->pageSize= $showNums;//$this->module['front']['category_list_count'];
        $pages->applyLimit($criteria);

        $list =Book::model()->findAll($criteria);

        //      var_dump($list);

        // SEO 相关
        $this->setSEOVar("分类名", $category->seotitle != "" ? $category->seotitle : $category->title);
        $this->setSEOVar("分类关键字", $category->keywords);
        $this->setSEOVar("分类描述", $category->description);

        $this->setAllSEOInfo("分类页");

        $this->assign("category", $category);
        $this->assign("list", $list);
        $this->assign("pages", $pages);
//        $this->assign("keywords", "just for test");

        //      print_r(Yii::app()->hasModule("test"));
        //      $this->renderPartial("index");

        $this->render("index");
    }

    /**
     * 最新更新页
     */
    public function actionLastupdate()
    {
        $criteria = new CDbCriteria();
        $criteria->compare("status", Yii::app()->params['status']['ischecked']);
        $criteria->order = "lastchaptertime desc";

        $count=Book::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
    	if(empty($tempconf->LastupdateShowNums)){
			$showNums = 30;
		}else{
			$showNums = $tempconf->LastupdateShowNums;
		}
        $pages->pageSize= $showNums;//$this->module['front']['category_list_count'];
        $pages->applyLimit($criteria);

        $list =Book::model()->findAll($criteria);

        // SEO 相关
        $this->setSEOVar("分类名", "最新更新");
        $this->setAllSEOInfo("分类页");
        $this->assign("list", $list);
        $this->assign("pages", $pages);
        $this->render("lastupdate");
    }

    /**
     * 搜索页
     */
    public function actionSearch()
    {
    	$tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
    	if(empty($tempconf->searchtime)){
			$searchtime = 10;
		}else{
			$searchtime = $tempconf->searchtime;
		}
    	if(empty($tempconf->searchShowNums)){
			$searchShowNums = 30;
		}else{
			$searchShowNums = $tempconf->searchShowNums;
		}
    	$searchkey = 'search_'.Yii::app()->user->id;
		if (false != Yii::app()->cache->get($searchkey) && !isset($_GET['page'])){
			H::showmsg('不能频繁搜索','/');
		}else{
			Yii::app()->cache->set($searchkey,1,$searchtime);
		}
		$keyword = addslashes(trim($_GET['keyword']));
		if(strlen($keyword) <= 0){
			H::showmsg('搜索关键词不能为空','/');
		}
        $criteria = new CDbCriteria();
        $criteria->addSearchCondition('title', $keyword);
        $criteria->addSearchCondition('author', $keyword, true, 'OR');
        $criteria->compare("status", Yii::app()->params['status']['ischecked']);
        $criteria->order = "lastchaptertime desc";

        $count=Book::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize= $searchShowNums;//$this->module['front']['category_list_count'];
        $pages->applyLimit($criteria);

        $list =Book::model()->findAll($criteria);

        // SEO 相关
        $this->setSEOVar("分类名", strip_tags($keyword) . "搜索结果");
        $this->setAllSEOInfo("分类页");
        $this->assign("list", $list);
        $this->assign("pages", $pages);
        $this->assign("keyword", $keyword);

        
		$model = Searchlog::model()->findByAttributes(array('keywords'=>$keyword));

        if(null == $model){
        	$model = new Searchlog();
        	$model->keywords = $keyword;
        	$model->nums = 1;
        	$model->dateline = time();
        }else{
        	$model->nums += 1;
        }

        $model->result_nums = $count;
        $model->lasttime = time();
        $model->save();
		
        $this->render("search");
    }

    public function actionRank()
    {
        $this->setSEOVar("分类名", "点击排行榜");
        $this->setAllSEOInfo("分类页");
		$tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
		if(empty($tempconf->TopShowNums)){
			$showNums = 30;
		}else{
			$showNums = $tempconf->TopShowNums;
		}
        $this->render("rank",array('showNums'=>$showNums));
    }
    /**
     * 字母
     */
    public function actionInitial()
    {
    	$initial = Yii::app()->request->getParam('zimu',null);
    	if(null == $initial){
    		$this->redirect(array('lastupdate'));
    	}
        $criteria = new CDbCriteria();
        $criteria->compare("initial", $initial);
        $criteria->order = "lastchaptertime desc";

        $count=Book::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
        $pages->pageSize= $this->module['front']['category_list_count'];
        $pages->applyLimit($criteria);

        $list =Book::model()->findAll($criteria);

        // SEO 相关
        $this->setSEOVar("分类名", "文章列表");
        $this->setAllSEOInfo("分类页");
        $this->assign("list", $list);
        $this->assign("pages", $pages);
        $this->render("initial", array('initial'=>$initial));
    }
    /**
     * 全本
     */
    public function actionQuanben()
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition("flag!=".$this->module['front']['flagstatus']);
        $criteria->order = "lastchaptertime desc";

        $count=Book::model()->count($criteria);
        $pages=new CPagination($count);

        // results per page
    	$tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
		if(empty($tempconf->TopShowNums)){
			$showNums = 30;
		}else{
			$showNums = $tempconf->TopShowNums;
		}
        $pages->pageSize= $showNums;
        //$pages->pageSize= $this->module['front']['category_list_count'];
        $pages->applyLimit($criteria);

        $list =Book::model()->findAll($criteria);

        // SEO 相关
        $this->setSEOVar("分类名", "全本小说");
        $this->setAllSEOInfo("分类页");
        $this->assign("list", $list);
        $this->assign("pages", $pages);
        $this->render("quanben");
    }
}