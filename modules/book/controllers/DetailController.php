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
        $id = $_GET['id'];

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

        $this->render("index");
    }

    /**
     * 小说信息页
     * @throws CHttpException
     */
    public function actionInfo()
    {
        $id = $_GET['id'];

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
        $id = $_GET['id'];
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

    public function actionDownPage()
    {
        $id = $_GET['id'];
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