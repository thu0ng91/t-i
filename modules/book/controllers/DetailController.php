<?php
/**
 * 小说信息模块，小说章节列表模块
 * Class DetailController
 */
class DetailController extends FWFrontController
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
                'duration' => $this->module->cacheConfig->BookDetailCacheTime,
                'varyByParam' => array('id'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> 'book-detail-index' . $_GET['id'],
//                'dependency' => array(
//                    'class'=> 'FWCacheDependency',
//                    'dependCacheKey'=> 'news-category' . $_GET['id'] . $_GET['page'],
//                )
            );
//            $ret[] = array (
//                'FWOutputCache + view',
//                'duration' => 2592000,
//                'varyByParam' => array('id'),
//                'varyByExpression' => array('FWOutputCache', 'getExpression'),
//                'dependCacheKey'=> 'news' . $_GET['id'],
////                'dependency' => array(
////                    'class'=> 'FWCacheDependency',
////                    'dependCacheKey'=> 'news' . $_GET['id'],
////                )
//            );
        }

        return $ret;
    }

    /**
     * 小说目录页
     * @throws CHttpException
     */
    public function actionIndex()
    {
        $id = intval($_GET['id']);

        $book = Book::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        if (!$book) {
            throw new CHttpException(404);
        }

        $this->assign("book", $book);

        $criteria = new CDbCriteria();
        $criteria->compare("bookid", $book->id);
        $criteria->order = "chapterorder asc";

        $chapterList = Chapter::customModel($book->id)->findAll($criteria);

        $this->assign("chapters", $chapterList);

        // 更新小说点击统计
        $book->updateClickStats();

        // seo 相关
        $this->setSEOVar("分类名", $book->category->seotitle != "" ? $book->category->seotitle : $book->category->title);
        $this->setSEOVar("分类关键字", $book->category->keywords);
        $this->setSEOVar("分类描述", $book->category->description);
        $this->setSEOVar("小说名", $book->title);
        $this->setSEOVar("小说关键字", $book->keywords);
        $this->setSEOVar("小说作者", $book->author);
        $this->setSEOVar("小说简介", $book->summary);

        $this->setAllSEOInfo("小说页");
		//链接处理
		$uservote_link = Yii::app()->createUrl('book/detail/uservote',array('id'=>$id));
		$this->assign("uservote_link", $uservote_link);
		$addbookcase_link = Yii::app()->createUrl('book/detail/addbookcase',array('id'=>$id));
		$this->assign("addbookcase_link", $addbookcase_link);
		
        $this->render("index");
    }

    /**
     * 小说信息页
     * @throws CHttpException
     */
    public function actionInfo()
    {
        $id = intval($_GET['id']);

        $book = Book::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        if (!$book) {
            throw new CHttpException(404);
        }

        $this->assign("book", $book);

        $criteria = new CDbCriteria();
        $criteria->compare("bookid", $book->id);
        $criteria->order = "chapterorder asc";

        $chapterList = Chapter::customModel($book->id)->findAll($criteria);

        $this->assign("chapters", $chapterList);

        // 更新小说点击统计
        $book->updateClickStats();

        // seo 相关
        $this->setSEOVar("分类名", $book->category->seotitle != "" ? $book->category->seotitle : $book->category->title);
        $this->setSEOVar("分类关键字", $book->category->keywords);
        $this->setSEOVar("分类描述", $book->category->description);
        $this->setSEOVar("小说名", $book->title);
        $this->setSEOVar("小说关键字", $book->keywords);
        $this->setSEOVar("小说作者", $book->author);
        $this->setSEOVar("小说简介", $book->summary);

        $this->setAllSEOInfo("小说页");

        $this->render("info");
    }

    /**
     * 小说下载
     */
    public function actionDownload()
    {
        $id = intval($_GET['id']);
        $book = Book::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        if (!$book) {
            throw new CHttpException(404);
        }

        $file = Book::getBookDataDir($id) . DS . "all.txt";

        if (!file_exists($file)) {
            throw new CHttpException(404);
        }

        $title = iconv("UTF-8", "GBK//ignore", $book->title);

//        echo $shortcut;

        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='. $title . '.txt');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        set_time_limit(0);
        readfile($file);

        Yii::app()->end();
    }
	public function actionUservote(){
		$id = Yii::app()->request->getParam('id',null);
		if(!Yii::app()->user->id){
			echo '<meta charset="utf-8" /><script>alert("请先登录");window.history.back(-1);</script>';
			Yii::app()->end();
		}
		$cacheKey = 'uservote_'.$id.'_'.Yii::app()->user->id;
		$cacheValue = Yii::app()->cache->get($cacheKey);
		if(null != $cacheValue){
			echo '<meta charset="utf-8" /><script>alert("今天您已经推荐过这本书了！");window.history.back(-1);</script>';
			Yii::app()->end();
		}
		$model = Book::model()->findByPk($id);
		
		$nowtime = time();
		$nowdate=date('Y-m-d', $nowtime);
		$nowweek=date('w', $nowtime);
		$addnum = 1;
		$lastdate=date('Y-m-d', $model->lastliketime);
		$lastweek=date('w', $model->lastliketime);
		if($lastweek==0) $lastweek=7;
		//$v['visitnum'] = intval($v['visitnum'] * $addnum);
		
		$allstr='alllikenum=alllikenum+'.$addnum;
		if($nowdate==$lastdate || $nowtime < $model->lastliketime){
			$daystr='daylikenum=daylikenum+'.$addnum;
			$weekstr='weeklikenum=weeklikenum+'.$addnum;
			$monthstr='monthlikenum=monthlikenum+'.$addnum;
		}else{
			$daystr='daylikenum='.$addnum;
			if($nowweek <= $lastweek || $nowtime - $model->lastliketime > 604800){
				$weekstr='weeklikenum='.$addnum;
			}else{
				$weekstr='weeklikenum=weeklikenum+'.$addnum;
			}
			if(substr($nowdate,0,7) == substr($lastdate,0,7)){
				$monthstr='monthlikenum=monthlikenum+'.$addnum;
			}else{
				$monthstr='monthlikenum='.$addnum;
			}
		}
		$sql = 'UPDATE book SET lastliketime='.$nowtime.', '.$daystr.', '.$weekstr.', '.$monthstr.', '.$allstr.' WHERE id='.$id;
		Yii::app()->db->createCommand($sql)->execute();
		//计算当天剩余秒数
		$endtime = strtotime(date('Y-m-d',time()))+86400;
		$votetime = $endtime-time();
		Yii::app()->cache->set($cacheKey, 1, $votetime);
		echo '<meta charset="utf-8" /><script>alert("感谢您的推荐！");window.history.back(-1);</script>';
		//$this->redirect(array('/book/detail/index','id'=>$id));
		Yii::app()->end();
	}
	
	public function actionAddbookcase(){
		if(!Yii::app()->user->id){
			echo '<meta charset="utf-8" /><script>alert("请先登录");window.history.back(-1);</script>';
			Yii::app()->end();
		}
		$id = Yii::app()->request->getParam('id',null);
		$model = Bookcase::model()->findByAttributes(array('userid'=>Yii::app()->user->id,'book_id'=>$id));
		if(null != $model){
			echo '<meta charset="utf-8" /><script>alert("您已经收藏过该书");window.history.back(-1);</script>';
			Yii::app()->end();
		}else{
			$model = new Bookcase();
			$model->userid = Yii::app()->user->id;
			$model->username = Yii::app()->user->name;
			$model->book_id = $id;
			$model->lastviewtime = time();
			$model->dateline = time();
			$model->status = 1;
			$model->save();
			echo '<meta charset="utf-8" /><script>alert("您成功收藏该书");window.history.back(-1);</script>';
			Yii::app()->end();
		}
	}
    public function actionDownPage()
    {
        $id = intval($_GET['id']);
        $book = Book::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        if (!$book) {
            throw new CHttpException(404);
        }

        $this->assign("book", $book);

        $criteria = new CDbCriteria();
        $criteria->compare("bookid", $book->id);
        $criteria->order = "chapterorder asc";

        $chapterList = Chapter::customModel($book->id)->findAll($criteria);

        $this->assign("chapters", $chapterList);

        $this->renderPartial('download');
    }
}