<?php
/**
 * 小说信息模块，小说章节列表模块
 * Class DetailController
 */
class DetailController extends FWFrontController
{
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
}