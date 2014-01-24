<?php
/**
 * 小说章节模块
 * Class DetailController
 */
class ChapterController extends FWFrontController
{
    public function actionIndex()
    {
        $bookid = $_GET['bookid'];
        $id = $_GET['id'];

        $book = Book::model()->findByPk($bookid);
        if (!$book) {
            throw new CHttpException(404);
        }

        $m = Chapter::customModel($bookid);
        $chapter = $m->findByPk($id);
        if (!$chapter) {
            throw new CHttpException(404);
        }

        $this->assign("book", $book);
        $this->assign("chapter", $chapter);

        //@done 因为对象模式会去加载txt章节内容从而浪费资源，所以此处可以优化
        // 上下章节编号

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
    
}