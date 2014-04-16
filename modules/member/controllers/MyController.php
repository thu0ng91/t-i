<?php
/**
 * 会员功能
 * Class DoController
 */
class MyController extends MemberController
{
    /**
     * 会员书架
     */
    public function actionBookcase()
    {
        $db = Yii::app()->db;

        $sql = "select
                b.title,b.lastchapterid,b.lastchaptertitle,mb.id,mb.readchaptertitle,mb.readchapterid,mb.bookid
                from book b, member_book mb where mb.bookid=b.id and mb.memberid=:memberid
                order by mb.updatetime desc
                limit 100
               ";

        $cmd = $db->createCommand($sql);


        $list = $cmd->queryAll(true, array(
            ':memberid' => $this->member->id,
        ));

        $this->assign("list", $list);

        $this->render("bookcase");
    }

    /**
     * 添加到书架
     * @param int $bookId
     * @param int $chapterId
     */
    public function actionAjaxAddBookcase($bookId, $chapterId)
    {
        $r = MemberBook::model()->exists("bookid=:bookid", array(
           ':bookid' => $bookId,
        ));

        if (!$r) { // 首次加入书架
            $m = new MemberBook();
            $m->bookid = $bookId;
            $m->memberid = $this->member->id;

            $chapter = Chapter::customModel($bookId)->findByPk($chapterId);
            if ($chapter) {
                $m->readchapterid = $chapterId;
                $m->readchaptertitle = $chapter->title;
            }
            $m->createtime = time();
            $m->updatetime = time();
            $m->save();

            $this->jsonOuputAndEnd(true);
        }

        $m = MemberBook::model()->find("bookid=:bookid", array(
            ':bookid' => $bookId,
        ));

        $chapter = Chapter::customModel($bookId)->findByPk($chapterId);
        if ($chapter) {
            $m->readchapterid = $chapterId;
            $m->readchaptertitle = $chapter->title;
            $m->updatetime = time();

            $m->update(array(
                'readchapterid',
                'readchaptertitle',
                'updatetime',
            ));

            $this->jsonOuputAndEnd(true);
        }

        $this->jsonOuputAndEnd(false);
    }
}