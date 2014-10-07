<?php
/**
 * 会员功能
 * Class DoController
 */
class DoController extends FWFrontController
{
    public function actionLogin()
    {
        if(!Yii::app()->user->isGuest){
            $this->redirect(array('/site/index'));
        }
//        $this->layout = 'main-login';
        Yii::app()->theme = "system";

        if(isset($_POST['LoginForm']))
        { 
            $model = new LoginForm;
            $model->attributes=$_POST['LoginForm'];

            if($model->validate()){
                $loginStatus = $this->userLogin($model->username,$model->password);
                if($loginStatus === true){
                	H::showmsg('登录成功', Yii::app()->createUrl('/site/index'));
                }else{
                	H::showmsg('账号或密码错误', Yii::app()->createUrl('/site/index'));
                }
            }

        }
        $this->setAllSEOInfo("登陆页");
//        $this->setSEOVar()
        //$this->render('login',array('model'=>$model));
        $this->renderPartial('login');
    }


    /**
     * 退出
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
//        $this->renderPartial('site/index');
		$this->redirect(array('/site/index'));
    }

    /**
     * 注册
     */
    public function actionRegister()
    {
        Yii::app()->theme = "system";

        $model = new RegisterForm();

//        $evt = new FWHookEvent($this, null);

        FWHook::run("member", "beforeRegister", new FWHookEvent($this, null));
		
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$db = Yii::app()->db;
			$sql = "select * from member where username='$username' ";
			$cmd = $db->createCommand($sql);
			$result = $cmd->execute();
			$success = $result  ? 1 : 0;
			echo $success;exit; //转成json数据
		}
		
        if(isset($_POST['RegisterForm']))
        {
        	if($_POST['RegisterForm']['password'] != $_POST['RegisterForm']['repassword']){
        		H::showmsg('两次密码输入不一致', Yii::app()->createUrl('/member/do/register'));
        		$this->refresh();
        	}
        	if(strlen($_POST['RegisterForm']['password']) < 6){
        		H::showmsg('密码不得小于6个字符', Yii::app()->createUrl('/member/do/register'));
        		$this->refresh();
        	}
        	$model = new Member();
        	$_POST['RegisterForm']['createtime'] = time();
            $model->attributes = $_POST['RegisterForm'];

            if($model->validate()){
                $model->status = Yii::app()->params['status']['ischecked'];
                if ($model->save()) {
                    FWHook::run("member", "afterRegisterSuccess", new FWHookEvent($this, array($model)));
	                $loginStatus = $this->userLogin($_POST['RegisterForm']['username'],$_POST['RegisterForm']['password']);
	                if($loginStatus === true){
	                	H::showmsg('恭喜，注册成功！', Yii::app()->createUrl('/site/index'));
	                }else{
	                	H::showmsg('注册失败，请联系管理员！', Yii::app()->createUrl('/site/index'));
	                }
                	$this->refresh();
                } else {
                    H::showmsg('注册失败，请联系管理员！', Yii::app()->createUrl('/member/do/register'));
                    $this->refresh();
                }
            } else {
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                    break;
                }
				H::showmsg($msg, Yii::app()->createUrl('/member/do/register'));
                //Yii::app()->user->setFlash('actionInfo', $msg);
                //$this->refresh();
            }
        }

        $this->setAllSEOInfo("注册页");
        //$this->render('login',array('model'=>$model));
        $this->render('register',array('model'=>$model));
    }

    /**
     * ajax 检查用户是否登录，登录成功返回用户信息
     */
    public function actionAjaxCheckLogin()
    {
        if (Yii::app()->user->isGuest) {
            $this->jsonOuputAndEnd(false);
        }
//        print_r(Yii::app()->user->info->attributes);exit;
        $this->jsonOuputAndEnd(true, H::getNeedColumns(Yii::app()->user->info, array('username', 'id')));
    }
    
    //用户登录
    private function userLogin($username,$password){
    	$identity = new MemberIdentity($username,$password);
		if($identity->authenticate()){
			Yii::app()->user->login($identity);
			// 记录登陆信息
			$m = Member::model()->findByPk(Yii::app()->user->info->id);
			$m->updateLoginInfo();
			return true;
		}else{
			return false;
		}
    }
    
    /*
     * <script type="text/javascript" src="{novel_link url='/member/do/ajaxlogin'}"></script>
     */
    public function actionAjaxlogin(){
    	$user = Yii::app()->user;
		$msg = '';
    	if(isset($_POST['LoginForm'])){ 
            $model = new LoginForm;
            $model->attributes=$_POST['LoginForm'];
			
            if($model->validate()){
                $loginStatus = $this->userLogin($model->username,$model->password);
                if($loginStatus === true){
                	H::showmsg('登录成功', Yii::app()->createUrl('/site/index'));
                }else{
                	//H::showmsg('', Yii::app()->createUrl('/member/do/ajaxlogin'));
                	$msg = 1;//'账号或密码错误';
                	H::showmsg('账号或密码错误', Yii::app()->createUrl('/site/index'));
                }
            }

        }
    	$this->renderPartial('ajaxlogin',array('user'=>$user,'msg'=>$msg));
    }
    public function actionAjaxlogout(){
    	Yii::app()->user->logout();
    	$this->redirect(array('/site/index'));
    }
}