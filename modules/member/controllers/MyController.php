<?php
/**
 * 会员功能
 * Class DoController
 */
class MyController extends MemberController
{

    public function actionIndex()
    {
//        var_dump(Yii::app()->themeManager->baseUrl);
        exit;
    }
	
     /**
     * 会员头像获取
     */
	public function getAvatar($ava)
    {	
    	$avatar = FW_ROOT_PATH. DS .'uploads'.DS.'member'.DS.$ava;

    	if(file_exists($avatar)) {
    		return Yii::app()->baseUrl. DS .'uploads'.DS.'member'.DS.$ava;
    	} else {
    		return false;
    	}
    }
    
     /**
     * 会员信息
     */
	public function actionInformation()
    {	
    	$connection = Yii::app()->db;
    	$uid = Yii::app()->user->id;
    	$model = Member::model()->findByPk($uid);
    	$this->assign("uid", $uid);
    	$this->assign("username", $model->username);
    	
    	if($model->vip_level == 1) {
    		$this->assign("level", "黄金会员");
    	} else {
    		$this->assign("level", "青铜会员");
    	}

    	$this->assign("gender", $model->gender);
    	if($this->getAvatar($model->avatar) == false) {
    		$avatar = false;
    	} else {
    		$avatar = $this->getAvatar($model->avatar);
    	}
    	
		$this->assign("avatar", $avatar);//头像
		$this->assign("qq", $model->qq);
		$this->assign("email", $model->email);
		$this->assign("telephone", $model->telephone);
		$this->assign("address", $model->address);
    	$userinfo = Yii::app()->user->info;

    	$this->assign("list", $userinfo);
    	if($_POST) {
    		$model->email = strip_tags($_POST['email']);
    		$model->gender = intval(strip_tags($_POST['gender']));
    		$model->qq = intval(strip_tags($_POST['qq']));
    		$model->telephone = intval(strip_tags($_POST['telephone']));
    		$model->address = strip_tags($_POST['address']);
    		$model->save();
    		H::showmsg('成功修改资料', Yii::app()->createUrl('/member/my/information'));
    	} else {
    		 $this->render("information");
    	}
    
    }
    
    /**
     * 会员头像上传
     */
	public function actionphotoupload()
    {
		$connection = Yii::app()->db;
   		$uid = Yii::app()->user->id;
    	$model = Member::model()->findByPk($uid);
    	$this->assign("uid", $uid);
    	$this->assign("username", $model->username);
    	$this->assign("avatar", $this->getAvatar($model->avatar));//头像
    	
    	if($model->vip_level == 1) {
    		$this->assign("level", "黄金会员");
    	} else {
    		$this->assign("level", "青铜会员");
    	}
    	$imgsize = 200;  			  //上传图片大小 K 为单位；
    	
    	if($_FILES){
    		if (!file_exists('uploads')){
    			mkdir ("uploads"); 
    		} 
    		if (!file_exists('uploads/member')){
    			mkdir ("uploads/member"); 
    		} 
            $filename = $_FILES['userimg']['name'];//获取文件名
            $filesize = $_FILES['userimg']['size'];//获取文件大小
            if($filesize / 1000 >=$imgsize ) {
            	$this->render("photoupload");
            	echo "<script>alert('图片大小不能超过$imgsize');</script>";
            	exit;
            }
		 	$filename1 = substr($filename, -5);
		 	$filename1 = preg_replace('/\W/','',$filename1);
		 	$filename1 = preg_replace('/1-9/','',$filename1);
			preg_match("/(jpg)|(jpeg)|(png)|(gif)/", $filename1,$s);
			if(!$s) {
				$this->render("photoupload");
            	echo "<script>alert('图片类型有误');</script>";
            	exit;
			}
			
    	
    
			$filename1 = $uid . "." . $s[0];
    		$uploadPath = "uploads/member/";
			$uploadfile = $uploadPath.$filename1;
			move_uploaded_file($_FILES["userimg"]["tmp_name"],$uploadPath .$filename1);
			$sql = "update member set avatar='$filename1' where id='$uid'";
			$command = $connection->createCommand($sql)->execute();
			H::showmsg('头像设置成功', Yii::app()->createUrl('/member/my/information'));

        }
        $this->render("photoupload");
   	}
    
     /**
     * 会员密码修改
     */
	public function actionpwdupdate()
    {
    	$db = Yii::app()->db;
    	$uid = Yii::app()->user->id;
    	$model = Member::model()->findByPk($uid);
    	$this->assign("uid", $uid);
    	$this->assign("username", $model->username);
    	$this->assign("avatar", $this->getAvatar($model->avatar));//头像
    	
    	if($model->vip_level == 1) {
    		$this->assign("level", "黄金会员");
    	} else {
    		$this->assign("level", "青铜会员");
    	}
    	if($_POST) {
    		if($model->password == H::encrpyt($_POST['opwd'])) {
    			if($_POST['npwd'] == null){
    				$this->render('pwdupdate');
            		echo "<script>alert('新密码不能为空');</script>";
            		exit;
    			}
    			if($_POST['npwd'] == $_POST['rpwd']) {
    				$sql = "update member set password='".H::encrpyt($_POST['npwd'])."' where id='$uid'";
    				$command = $db->createCommand($sql);
    				$result = $command->execute();
    				$this->render('pwdupdate');
    			} else {
    				$this->render('pwdupdate');
            		echo "<script>alert('新密码两次不相同');</script>";
            		exit;
    			}
    		} else {
    			$this->render('pwdupdate');
            	echo "<script>alert('当前密码错误');</script>";
            	exit;
    		}
    		$this->redirect('/member/my/information');
            exit;
    	}
        $this->render("pwdupdate");
    }
    
    /**
     * 会员书架
     */
    public function actionBookcase()
    {
    	$uid = Yii::app()->user->id;
    	$model = Member::model()->findByPk($uid);
    	$this->assign("uid", $uid);
    	$this->assign("username", $model->username);
    	$this->assign("avatar", $this->getAvatar($model->avatar));//头像
    	
    	if($model->vip_level == 1) {
    		$this->assign("level", "黄金会员");
    	} else {
    		$this->assign("level", "青铜会员");
    	}
        $db = Yii::app()->db;
        $sql = "select
                b.title,b.lastchapterid,b.lastchaptertitle,b.pinyin,mb.id,mb.lastviewtime,mb.book_id,mb.readchapterid,mb.readchaptertitle
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