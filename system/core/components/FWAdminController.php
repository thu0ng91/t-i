<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FWAdminController extends CController
{
	public $layout = 'main';

    public $menupanel;

    public $topMenus = array();
    public $leftMenus = array();

	public function init()
	{
		if(Yii::app()->user->isGuest&&$this->id!=='site'){
			Yii::app()->user->setFlash('actionInfo','您尚未登录系统！');
			$this->redirect(array('site/login'));
		}

//        var_dump(Yii::app()->hasModule("book"));
        $modules = Modules::model()->findAll('status=:status', array(
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        foreach ($modules as $m) {
            if ($m->adminmenus) {
                $cls = get_class($this);
                $cls = str_replace("Controller", "", $cls);
                $cls[0] = strtolower($cls[0]);
//                var_dump($this->getId(),$cls);
                $menus = unserialize($m->adminmenus);
//                $menus['url'] = Yii::app()->createUrl($menus['url']);
                $menus['top']['active'] = $this->getId() == $cls ? true : false;
                $this->topMenus[] = $menus['top'];

                if ($this->getId() == $cls) {
                    $this->leftMenus = $menus['left'];
                }
            }
        }

//		if(!empty($_GET['menupanel']))
//		{
//			$menupanel = explode('|',$_GET['menupanel']);
//			$this->menupanel = $menupanel;
//		}else{
//			$this->menupanel = explode('|','content|short');;
//		}

        $this->menupanel = $this->menus();
	}

    protected function menus()
    {
        return array(
            'content'
        );
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			if($this->loadModel($id)->delete()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['deleteSuccess']);
			}else {
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['deleteFail']);
			}
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect($_POST['returnUrl']);
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 * eq:if(isset($_POST['ajax']) && $_POST['ajax']==='article-form')
	 */

	protected function performAjaxValidation($model,$form)
	{
   		if(isset($_POST['ajax']) && $_POST['ajax']===$form)
   		{
        	echo CActiveForm::validate($model);
        	Yii::app()->end();
    	}
	}
	protected function girdShowImg($data)
	{
		if(!empty($data->imgurl))
			return true;
		else
			return false;
	}
	protected function showViewUrl($type,$data){
		return str_replace('admin.php','index.php',Yii::app()->createUrl("$type/view",array('id'=>$data->id)));
	}

    /**
     * 输出带有有失败、成功提示的JSON数据
     * @param $result boolean
     * @param $data mixed
     */
    public function jsonOutput($result, $data = null)
    {
        $r = array(
            "result" => $result ? true : false,
            "data" => $data,
        );

        echo json_encode($r);
    }

    /**
     * 输出带有有失败、成功提示的JSON数据并终止运行
     * @param $result boolean
     * @param $data mixed
     */
    public function jsonOuputAndEnd($result, $data = null)
    {
        $this->jsonOutput($result, $data);

        Yii::app()->end();
    }
}