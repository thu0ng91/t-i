<?php
/**
 * 区块管理
 * Class ListController
 */
class ListController extends FWModuleAdminController
{
    /**
     * 区块列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
      $dataProvider=new CActiveDataProvider('Friendlink',array(
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
          'model' => Friendlink::model(),
      ));
    }

    /**
     * 区块创建
     */
    public function actionCreate()
    {
    	$id = intval(Yii::app()->request->getParam('id',null));
		$model = Friendlink::model()->findByPk($id);
		if($model === null) {
			$model = new Friendlink();
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Friendlink']))
		{
			
//			$images = CUploadedFile::getInstancesByName('images');
//
//            if (isset($images)) {
//                $imgUrl = Upload::createFile($images, 'book', 'create');
//                $model->logo = $imgUrl;
//            }
//            VAR_DUMP($images);exit;
			if(isset($_FILES['Friendlink']['name']['logo']) && !empty($_FILES['Friendlink']['name']['logo'])){
				$file = CUploadedFile::getInstance($model,'logo');
				$filename = $file->getName();//获取文件名
				$filesize = $file->getSize();//获取文件大小
				$filetype = $file->getType();//获取文件类型
				$filename1 = iconv("utf-8", "gb2312", $filename);//这里是处理中文的问题，非中文不需要
				$uploadPath = "uploads/friendlink/";
				$uploadfile = $uploadPath.$filename1;
				$this->dmkdir($uploadPath);
				$file->saveAs($uploadfile,true);//上传操作
				$nowtime = time();
				rename($uploadfile,$uploadPath.$nowtime.'.jpg');
				$_POST['Friendlink']['logo'] = $uploadPath.$nowtime.'.jpg';
			}else{
				unset($_POST['Friendlink']['logo']);
			}
			$model->attributes=$_POST['Friendlink'];
			if($model->save())
				$this->redirect(array('index'));
		}
    	
        $this->render('create',array(
            'model'=>$model
        ));
    }
	
	public function actionDelete(){
		$id = intval(Yii::app()->request->getParam('id',null));
		FriendLink::model()->deleteByPk($id);
	}

    public function loadModel($id)
    {
        $model = Block::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}