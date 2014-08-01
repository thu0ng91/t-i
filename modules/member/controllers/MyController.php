<?php
/**
 * 会员功能
 * Class DoController
 */
class MyController extends MemberController
{

    public function actionIndex()
    {
        var_dump(Yii::app()->themeManager->baseUrl);
        exit;
    }

    /**
     * 会员书架
     */
    public function actionBookcase()
    {
        $db = Yii::app()->db;

        $sql = "select
                b.title,b.lastchapterid,b.lastchaptertitle,mb.id,mb.lastviewtime,mb.book_id
                from book b, bookcase mb where mb.book_id=b.id and mb.userid=:memberid and mb.status=1
                order by mb.id desc
                limit 100
               ";

        $cmd = $db->createCommand($sql);


        $list = $cmd->queryAll(true, array(
            ':memberid' => $this->member->id,
        ));

        $newList = array();
        foreach ($list as $v) {
            $newList[] = (Object)$v;
        }
        $this->assign("list", $newList);

        $this->render("bookcase");
    }
	public function actionDeletebookcase(){
		$id = Yii::app()->request->getParam('id',null);
		$model = Bookcase::model()->findByPk($id);
		if(null != $model){
			$model->status = 2;
			$model->save();
		}
		$this->redirect('/member/my/bookcase');
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