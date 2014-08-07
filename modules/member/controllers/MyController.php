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
     * 会员信息
     */
	public function actionInformation()
    {	
    	$userinfo = Yii::app()->user->info;
    	$this->assign("list", $userinfo);
        $this->render("information");
    }
    
    /**
     * 会员头像上传
     */
	public function actionphotoupload()
    {
    	$uid = Yii::app()->user->id;
    	$model = Member::model()->findByPk($uid);
    	if(null == $model){//如果用户不存在
    		//这里要加上跳转提示
    		echo '用户不存在';
    		Yii::app()->end();
    	}
    	if($_FILES){
    		if (!file_exists('uploads')){
    			mkdir ("uploads"); 
    		} else {
    			if (!file_exists('uploads/member')){
    				mkdir ("uploads/member"); 
    			} else {
	            	$filename = $_FILES['userimg']['name'];//获取文件名
					//$filesize = $file->getSize();//获取文件大小
					//$filetype = $file->getType();//获取文件类型
					$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
					$filename1 = $model->id . $filename1;
    				$uploadPath = "uploads/member/";
					$uploadfile = $uploadPath.$filename1;
					move_uploaded_file($_FILES["userimg"]["tmp_name"],$uploadPath .$filename1);
					$model->avatar = $filename1;
					echo $model->avatar;  //输出  QQͼƬ20140614112850.jpg
    				$model->save();
    				var_dump($model->getErrors());exit;
					$this->redirect('/member/my/information');
    			}
    		}
        }
        $this->render("photoupload");
   	}
    
     /**
     * 会员密码修改
     */
	public function actionpwdupdate()
    {
        $this->render("pwdupdate");
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