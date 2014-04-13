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
        $this->layout = 'main-login';
        $model=new LoginForm;
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            $identity=new MemberIdentity($model->username,$model->password);
            if($model->validate()){
                if($identity->authenticate()){
                    Yii::app()->user->login($identity);
                    $this->redirect(array('/site/index'));
                }else{
                    Yii::app()->user->setFlash('actionInfo','用户名或密码错误！');
                    $this->refresh();
                }
            }

        }
        //$this->render('login',array('model'=>$model));
        $this->render('login',array('model'=>$model));
    }
}