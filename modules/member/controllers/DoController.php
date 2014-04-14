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
            $model=new LoginForm;
            $model->attributes=$_POST['LoginForm'];

            if($model->validate()){
                $identity=new MemberIdentity($model->username,$model->password);
                if($identity->authenticate()){
                    Yii::app()->user->login($identity);
                    $this->redirect(array('/site/index'));
                }else{
                    Yii::app()->user->setFlash('actionInfo','用户名或密码错误');
                    $this->refresh();
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
        $this->redirect(array('login'));
    }

    /**
     * 注册
     */
    public function actionRegister()
    {
        Yii::app()->theme = "system";

        $model = new RegisterForm();

        if(isset($_POST['RegisterForm']))
        {
            $model->attributes = $_POST['RegisterForm'];
//            $identity = new UserIdentity($model->username,$model->password);

//            if(!$this->createAction('captcha')->validate($model->verifyCode, false)){
//                Yii::app()->user->setFlash('actionInfo','验证码错误！');
//                $this->refresh();
//            }

            if($model->validate()){
                $model = new Member();
                $model->attributes = $_POST['RegisterForm'];
                if ($model->save()) {
                    Yii::app()->user->setFlash('actionInfo','恭喜，注册成功！请登陆！');
                    $this->redirect(array('login'));
                } else {
                    Yii::app()->user->setFlash('actionInfo',"注册失败，请联系管理员！");
                    $this->refresh();
                }
            } else {
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                }
                Yii::app()->user->setFlash('actionInfo', $msg);
                $this->refresh();
            }
        }

        $this->setAllSEOInfo("注册页");
        //$this->render('login',array('model'=>$model));
        $this->render('register',array('model'=>$model));
    }
}