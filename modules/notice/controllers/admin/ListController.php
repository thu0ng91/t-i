<?php
/**
 * 公告管理
 * Class ListController
 */
class ListController extends FWAdminController
{
    /**
     * 公告列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
      $dataProvider=new CActiveDataProvider('Notice',array(
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
          'model' => Notice::model(),
      ));
    }

    /**
     * 公告创建
     */
    public function actionCreate()
    {
    	$id = intval(Yii::app()->request->getParam('id',null));
		$model = Notice::model()->findByPk($id);
		if($model === null) {
			$model = new Notice();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Notice']))
		{
			$model->attributes=$_POST['Notice'];
			if($model->save())
				$this->redirect(array('index'));
		}
    	
        $this->render('create',array(
            'model'=>$model
        ));
    }
	
	public function actionDelete(){
		$id = intval(Yii::app()->request->getParam('id',null));
		Notice::model()->deleteByPk($id);
	}

    public function loadModel($id)
    {
        $model = Notice::model()->findByPk((int)$id);
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