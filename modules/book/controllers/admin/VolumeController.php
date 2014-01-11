<?php
/**
 * 分卷分卷管理
 * Class VolumeController
 */
class VolumeController extends FWAdminController
{
    /**
     * 分卷列表
     */
    public function actionIndex($bookid)
    {
      $criteria=new CDbCriteria();
    //        $criteria->addCondition('status=:stauts');
    //        $criteria->params[':status'] = Yii::app()->params['status']['ischecked'];

//      if(!empty($_GET['Volume']['title']))
//          $criteria->addSearchCondition('title',$_GET['Volume']['title']);
//
//      if(!empty($_GET['Volume']['author']))
//          $criteria->addSearchCondition('author',$_GET['Volume']['author']);
//
//      if(!empty($_GET['Volume']['cid'])){
//          $categoryList=array();
//          $categoryList[] = $_GET['Volume']['cid'];
//          Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll(), $_GET['Volume']['cid']);
//          $criteria->addInCondition('cid',$categoryList);
//      }
//        $criteria->compare("bookid", $bookid);
        $book = Book::model()->findByPk($bookid);

//      if(isset($_GET['Volume']['recommendlevel'])){
//          $criteria->compare('recommendlevel', $_GET['Volume']['recommendlevel']);
//      }
//
        $criteria->compare('bookid', $bookid);
//      $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));

      $dataProvider=new CActiveDataProvider('Volume',array(
          'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=>Yii::app()->params['girdpagesize'],
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
//          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Volume::model(),
          'book' => $book
      ));
    }

    /**
     * 分卷创建
     */
    public function actionCreate($bookid)
    {
        $model=new Volume;
        $book = Book::model()->findByPk($bookid);

//        $cid=$_GET['cid'];
        if($book)
            $model->bookid=$bookid;

        if(isset($_POST['Volume']))
        {
            $model->attributes=$_POST['Volume'];
//            $upload = CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','create');
//            }
            if($model->save()){

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        $this->render('create',array(
            'model'=>$model,
            'book' => $book,
//            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 分卷更新
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
//        $book = Book::model()->findByPk($bookid);
        if(!empty($_POST['Volume']))
        {
            $model->attributes=$_POST['Volume'];
//            $upload=CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','update',$model->imgurl);
//            }

            if($model->save()){

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }
        }

//        $bookImages = VolumeImage::model()->findAll('bookid=:bookid', array(
//            ':bookid' => $model->id,
//        ));
        $this->render('update',array(
            'model'=>$model,
//            'bookimages' => $bookImages,
//            'categorys'=>Category::model()->showAllSelectCategory(),
//            'book' => $book,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=Volume::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}