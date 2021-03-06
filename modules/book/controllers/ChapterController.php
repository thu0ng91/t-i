<?php
/**
 * 小说章节模块
 * Class DetailController
 */
class ChapterController extends FWModuleFrontController
{
    /**
     * 过滤器
     * 添加透明缓存
     * @return array
     */
    public function filters() {
        $ret = array();

        $cfg = Yii::app()->settings->get("BookHtmlConfig", 'book-config-makehtml');
        if ($cfg != null && $cfg->BookChapterIsMakeHtml == 1) {
            $ret[] = array (
                'FWOutputCache + index',
                'duration' => 10,
                'varyByParam' => array('bookid', 'id'),
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
                'duration' => $this->module->cacheConfig->BookChapterCacheTime,
                'varyByParam' => array('bookid', 'id'),
                'varyByExpression' => array('FWOutputCache', 'getExpression'),
                'dependCacheKey'=> 'chapter-index' . $_GET['bookid'] . $_GET['id'],
            );

        }

        return $ret;
    }

    public function actionIndex()
    {
        $id = $_GET['id'];
//        $book = Book::model()->findByPk($bookid);
//
        $bookid = $_GET['bookid'];
        if ($bookid > 0) {
            $book = Book::model()->find("id=:id and status=:status", array(
                ':id' => $bookid,
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

        $bookid = $book->id;

        $m = Chapter::customModel($bookid);
        $chapter = $m->findByPk($id);
        if (!$chapter) {
            throw new CHttpException(404);
        }

        $chapter->content = $chapter->getContentFromFile();

        $this->assign("book", $book);
        $this->assign("chapter", $chapter);

        //@done 因为对象模式会去加载txt章节内容从而浪费资源，所以此处可以优化
        // 取得上下章节编号
        $sql = "select id from chapter where contenttype=0 and chapterorder<:chapterorder order by chapterorder desc limit 1";
        $db = $m->getDbConnection();
        $r = $db->createCommand($sql)->queryRow(true, array(
            ':chapterorder' => $chapter->chapterorder,
        ));
        $prevChapterId = $r['id'];
        $this->assign("prevChapterId", $prevChapterId);

        $sql = "select id from chapter where contenttype=0 and chapterorder>:chapterorder order by chapterorder asc limit 1";
        $r = $db->createCommand($sql)->queryRow(true, array(
            ':chapterorder' => $chapter->chapterorder,
        ));
        $nextChapterId = $r['id'];
        $this->assign("nextChapterId", $nextChapterId);

//        $criteria = new CDbCriteria();
//        $criteria->compare("contenttype", 0);
//        $criteria->compare("chapterorder", "<" . $chapter->chapterorder);
//        $criteria->order = "chapterorder desc";
//        $prevChapter = $m->find($criteria);
//        $this->assign("prevChapter", $prevChapter);
//
//        $criteria = new CDbCriteria();
//        $criteria->compare("contenttype", 0);
//        $criteria->compare("chapterorder", ">" . $chapter->chapterorder);
//        $criteria->order = "chapterorder asc";
//        $nextChapter = $m->find($criteria);
//        $this->assign("nextChapter", $nextChapter);

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
        $this->setSEOVar("章节名", $chapter->title);

        $this->setAllSEOInfo("章节页");

        $this->render("index");
    }
    public function actionUpdatebookcase(){
    	$bookid = intval(Yii::app()->request->getParam('id',null));
    	$chapter_id = intval(Yii::app()->request->getParam('cid',null));
    	$readtitle = Yii::app()->request->getParam('readtitle',null);
    	$model = Bookcase::model()->findByAttributes(array('userid'=>Yii::app()->user->id,'book_id'=>$bookid));
		if(null != $model){
			$model->readchapterid = (null != $chapter_id ? $chapter_id : 0);
			$model->lastviewtime = time();
			$model->readchaptertitle = $readtitle;
			$model->save();
		}
    }
}