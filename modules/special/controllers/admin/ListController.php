<?php
/**
 * 专题管理
 * Class ListController
 */
class ListController extends FWModuleAdminController
{
    /**
     * 专题列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
      $dataProvider=new CActiveDataProvider('Special',array(
          'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=> $this->module['admin']['list_count'],
          ),
          'sort'=>array(
              'defaultOrder'=>array(
                  'id' => CSort::SORT_DESC,
              ),
          ),
      ));
      $this->render('index',array(
          'dataProvider'=>$dataProvider,
//          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Special::model(),
      ));
    }

    /**
     * 专题创建和编辑
     */
    public function actionCreate()
    {
    	$id = intval(Yii::app()->request->getParam('id',null));
		$model = Special::model()->findByPk($id);
		if($model === null) {
			$model = new Special();
		}

		$folder = Yii::app()->modulePath.DS.'special'.DS.'views'.DS.'detail'.DS;

		$fp = @opendir($folder);
		$arr_file = array();
		if(false != $fp){
			while(false!=$file=readdir($fp)){
			    if($file!='.' &&$file!='..'){
			        $filename = explode('.',$file);
			        $arr_file[$filename[0]]=$filename[0];
			    }
			}
		}
		closedir($fp);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Special']))
		{
			$model->attributes=$_POST['Special'];
			if($model->save())
				$this->redirect(array('index'));
		}
    	
        $this->render('create',array(
            'model'=>$model,'arr_file'=>$arr_file
        ));
    }
	
	public function actionDelete(){
		$id = intval(Yii::app()->request->getParam('id',null));
		Special::model()->deleteByPk($id);
	}

    public function loadModel($id)
    {
        $model = Special::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
	public function actionUpload()
    {
        Yii::import('application.extensions.upload.*');
        $callback = $_GET['CKEditorFuncNum'];
        if ($_FILES['upload']['name']) {
            $up = CUploadedFile::getInstanceByName("upload");
            $imgUrl = Upload::createFile($up, "images", "create");
            echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.$callback.', "'.Yii::app()->baseUrl.$imgUrl.'")</script>';
        }
    }
}