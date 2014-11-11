<?php
/**
 * 小说信息模块，小说章节列表模块
 * Class DetailController
 */
class DetailController extends FWModuleFrontController
{
    /**
     * 过滤器
     * 添加透明缓存
     * @return array
     */
    public function filters() {
        $ret = array();

        $cfg = Yii::app()->settings->get("BookHtmlConfig", 'book-config-makehtml');

        if ($cfg != null && $cfg->BookDetailIndexIsMakeHtml == 1) {
            $ret[] = array (
                'FWOutputCache + index',
                'duration' => 10,
                'varyByParam' => array('id'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> '',
//                'dependency' => array(
//                    'class'=> 'FWCacheDependency',
//                    'dependCacheKey'=> 'news-category' . $_GET['id'] . $_GET['page'],
//                )
            );
        } elseif ($this->siteConfig && $this->siteConfig->SiteIsUsedCache && $this->module->cacheConfig && ($this->module->cacheConfig->BookIsCache == 1)) {
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

        $book = null;
        if ($id > 0) {
            $book = Book::model()->find("id=:id and status=:status", array(
                ':id' => $id,
                ':status' => Yii::app()->params['status']['ischecked'],
            ));
        } elseif (isset($_GET['pinyin'])) {
            $book = Book::model()->find("pinyin=:pinyin and status=:status", array(
                ':pinyin' => $_GET['pinyin'],
                ':status' => Yii::app()->params['status']['ischecked'],
            ));
        }

        if (!$book) {
            throw new CHttpException(404);
        }


//        var_dump($_GET,$book);exit;

        $id = $book->id;

        $this->assign("book", $book);
    	if(Yii::app()->user->id){
			$bookcase = Bookcase::model()->findByAttributes(array('book_id'=>$id,'userid'=>Yii::app()->user->id));
			if(null != $bookcase){
				$bookcase->lastviewtime = time();
				$bookcase->save();
			}
        }

        $sort = 'asc';
        if (isset($_GET['sort']) && $_GET['sort'] == 'desc') {
            $sort = 'desc';
        }

        $criteria = new CDbCriteria();
        $criteria->compare("bookid", $book->id);
        $criteria->order = "chapterorder " . $sort;

        $chapterList = Chapter::customModel($book->id)->findAll($criteria);
        $this->assign("chapters", $chapterList);
		
        $chapterListst = array_slice($chapterList, 0, 9);
        $this->assign("chapterst", $chapterListst);
        
//        $result = array_reverse($chapterList);
        $chapterListla = array_slice($chapterList, -9, 9, true);
        $chapterListla = array_reverse($chapterListla);
        $this->assign("chapterla", $chapterListla);
        //获取最后章节预览
        $endchapter = array_slice($chapterList,-1,1);
        $endchaptertxt = Chapter::getChapterDesByCid($id,$endchapter[0]->id,200);
        $this->assign("endchaptertxt", $endchaptertxt);
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
		//评论内容
		$comments = null;
		$comments = Comment::model()->findAllByAttributes(array('book_id'=>$id),array('order'=>'digest desc,id desc','limit'=>5));
		$count_commends = Comment::model()->countByAttributes(array('book_id'=>$id));
		$username = Yii::app()->user->name;
		
		$avatar = false;
		$avatar = Member::getUserAvatarByUid(Yii::app()->user->id);
		//评论配置
    	$tempconf = Yii::app()->settings->get('SystemTempConfig', 'system');
		if(empty($tempconf->commentStatus)){
			$commentStatus = 1;
		}else{
			$commentStatus = $tempconf->commentStatus;
		}
		$this->assign("commentStatus", $commentStatus);
        $this->render("index",array('commends'=>$comments,'count_commends'=>$count_commends,'username'=>$username,'avatar'=>$avatar));
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
//            throw new CHttpException(404);
            H::showmsg("找不到书籍！", Yii::app()->createUrl("site/index"));
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
    	//下载权限设置
    	$permissionconf = Yii::app()->settings->get('PermissionConfig', 'system');
		if(empty($permissionconf->downPermission)){
			$downPermission = 2;
		}else{
			$downPermission = $permissionconf->downPermission;
		}
    	if($downPermission == 1 && !Yii::app()->user->id){
			H::showmsg('登录后才可以下载', Yii::app()->createUrl('/book/detail/index',array('id'=>$book->id, 'pinyin' => $book->pinyin)));
		}

        $url = Yii::app()->createUrl('site/index');

        if (!$book) {
            H::showmsg("找不到书籍！", $url);
        }

        if (false === ($file = $this->makeAllTxtFile($id))) {
            H::showmsg("找不到书籍内容！", $url);
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
    /**
     * 小说推荐
     */
	public function actionUservote(){
		$id = Yii::app()->request->getParam('id',null);
		if(!Yii::app()->user->id){
			echo '请先登录';Yii::app()->end();
		}
		$cacheKey = 'uservote_'.$id.'_'.Yii::app()->user->id;
		$cacheValue = Yii::app()->cache->get($cacheKey);
		if(null != $cacheValue){
			echo '今天您已经推荐过这本书了！';Yii::app()->end();
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
		echo '感谢您的推荐！';Yii::app()->end();
	}
	/**
	 * 加入书架
	 */
	public function actionAddbookcase(){
		if(!Yii::app()->user->id){
			echo '请先登录';Yii::app()->end();
		}
		$id = intval(Yii::app()->request->getParam('id',null));
		$cid = intval(Yii::app()->request->getParam('cid',null));

		$readtitle = Yii::app()->request->getParam('readtitle',null);
		$model = Bookcase::model()->findByAttributes(array('userid'=>Yii::app()->user->id,'book_id'=>$id));


		
		if(null != $model){
			$model->status = 1;
			$model->readchapterid = null == $cid ? 0 : intval($cid);
			$model->lastviewtime = time();
			$model->readchaptertitle = $readtitle;
			$model->save();
			echo '本书已经在您的书架中';
		}else{			
			
			$model = new Bookcase();
			$model->status = 1;
			$model->readchapterid = intval($cid);
			$model->lastviewtime = time();
			$model->userid = Yii::app()->user->id;
			$model->username = Yii::app()->user->name;
			$model->book_id = $id;
			$model->readchaptertitle = $readtitle;
			$model->dateline = time();
			$model->save();			
			echo '恭喜您成功将本书加入书架';
		}
		Yii::app()->end();
	}
    public function actionDownPage()
    {
        $id = intval($_GET['id']);
        $book = Book::model()->find("id=:id and status=:status", array(
            ':id' => $id,
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        if (!$book) {
//            throw new CHttpException(404);
            H::showmsg("找不到书籍！", Yii::app()->createUrl("site/index"));
        }

        $this->assign("book", $book);

        $criteria = new CDbCriteria();
        $criteria->compare("bookid", $book->id);
        $criteria->order = "chapterorder asc";

        $chapterList = Chapter::customModel($book->id)->findAll($criteria);

        $this->assign("chapters", $chapterList);

        $this->renderPartial('download');
    }

    /**
     * 根据书籍生成对应的全部章节的txt并返回txt文件路径，失败返回false
     * @param $bookId
     * @return bool|string
     */
    protected function makeAllTxtFile($bookId)
    {
        $dir = Book::getBookDataDir($bookId);

        if (!is_dir($dir)) return false;
        $allTxtFile = $dir . DS . "all.txt";

        $allTextFileTime = @filemtime($allTxtFile);
        if (false === $allTextFileTime) $allTextFileTime = 0;

        if (filemtime($dir . DS . ".") <= $allTextFileTime) {
            return $allTxtFile;
        }

        $iterator = new DirectoryIterator($dir);

        $isMake = false;
        foreach ($iterator as $f) {
			$fileName = $f->getFilename();
  			$pos_dot = strrpos($fileName, "."); // find '.'
  			$ext = ($pos_dot !== false) ? substr($fileName, $pos_dot+1) : '';
            if ($f->isFile() && !$f->isDot() && strtolower($ext) == 'txt' && $f->getMTime() > $allTextFileTime) {
                @file_put_contents($allTxtFile, file_get_contents($f->getPathname()), FILE_APPEND);

                if (!$isMake) $isMake = true;
            }
        }

        if ($allTextFileTime > 0 || $isMake) return $allTxtFile;

        return false;
    }
}
