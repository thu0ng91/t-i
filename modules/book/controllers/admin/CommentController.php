<?php
class CommentController extends FWAdminController{
	public function actionIndex(){
		$criteria=new CDbCriteria();
    //        $criteria->addCondition('status=:stauts');
    //        $criteria->params[':status'] = Yii::app()->params['status']['ischecked'];

      if(!empty($_GET['Comment']['username']))
          $criteria->addSearchCondition('username',$_GET['Comment']['username']);

      if(!empty($_GET['Comment']['book_id']))
      		$data = Book::model()->findByAttributes(array('title'=>$_GET['Comment']['book_id']));
      		$book_id = $data->id;
          $criteria->addSearchCondition('book_id',$book_id);
      if(!empty($_GET['Comment']['content']))
          $criteria->addSearchCondition('book_id',$_GET['Comment']['content']);

      if(!empty($_GET['Comment']['digest'])){
          $criteria->addCondition('digest', $_GET['Comment']['digest']);
      }
	  if(isset($_GET['Comment']['digest'])){
          $criteria->compare('digest', $_GET['Book']['digest']);
      }else{
          $criteria->addNotInCondition('digest', $_GET['Comment']['digest']);
      }
      if(isset($_GET['Comment']['status'])){
          $criteria->compare('status', $_GET['Book']['status']);
      }else{
          $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));
      }

      $dataProvider=new CActiveDataProvider('Comment',array(
          'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=> $this->module['admin']['list_count'],
          ),
          'sort'=>array(
              'defaultOrder'=>array(
                  'id' => CSort::SORT_DESC,
              ),
              'attributes'=>array(
                  'id',
                  'createtime',
              ),
          ),
      ));
      $this->render('index',array(
          'dataProvider'=>$dataProvider,
          'model' => Comment::model(),
      ));
	}
	public function actionDelete()
	{
		$id = Yii::app()->request->getParam('id',null);
		$model = Comment::model()->findByPk($id);
		$model->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	public function actionDelall() {
        if (Yii::app()->request->isPostRequest) {
            $criteria = new CDbCriteria;
            $criteria->addInCondition('id', $_POST['id']);
            Comment::model()->deleteAll($criteria); //News换成你的模型

            if (isset(Yii::app()->request->isAjaxRequest)) {
                echo CJSON::encode(array('success' => true));
            } else
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
}