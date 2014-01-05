<?php

class AdminController extends FWAdminController
{
    /**
     * 小说列表
     */
    public function actionBookList()
    {
      $criteria=new CDbCriteria();
    //        $criteria->addCondition('status=:stauts');
    //        $criteria->params[':status'] = Yii::app()->params['status']['ischecked'];

      if(!empty($_GET['Book']['title']))
          $criteria->addSearchCondition('title',$_GET['Book']['title']);

      if(!empty($_GET['Book']['author']))
          $criteria->addSearchCondition('author',$_GET['Book']['author']);

      if(!empty($_GET['Book']['cid'])){
          $categoryList=array();
          $categoryList[] = $_GET['Book']['cid'];
          Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll(), $_GET['Book']['cid']);
          $criteria->addInCondition('cid',$categoryList);
      }

      if(isset($_GET['Book']['recommendlevel'])){
          $criteria->compare('recommendlevel', $_GET['Book']['recommendlevel']);
      }

      $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));

      $dataProvider=new CActiveDataProvider('Book',array(
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
      $this->render('book/list',array(
          'dataProvider'=>$dataProvider,
          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Book::model(),
      ));
    }

    /**
     * 小说创建
     */
    public function actionBookCreate()
    {
        $model=new Book;
        $cid=$_GET['cid'];
        if(!empty($cid))
            $model->cid=$cid;
        if(isset($_POST['Book']))
        {
            $model->attributes=$_POST['Book'];
//            $upload = CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','create');
//            }
            if($model->save()){
                $images = CUploadedFile::getInstancesByName('images');

                if (isset($images) && count($images) > 0) {
                    foreach ($images as $k => $image) {
                        $imgUrl = Upload::createFile($image, 'book', 'create');
                        $m = new BookImage();
                        $m->bookid = $model->id;
                        $m->imgurl = $imgUrl;
                        $m->iscover = 1;
                        $m->save();
                    }

                    // 更新主表封面图信息
                    $model->hascover = 1;
                    $model->save();
                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        $this->render('book/create',array(
            'model'=>$model,
            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 小说更新
     * @param $id
     */
    public function actionBookUpdate($id)
    {
        $model=$this->loadBookModel($id);
        if(!empty($_POST['Book']))
        {
            $model->attributes=$_POST['Book'];
//            $upload=CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','update',$model->imgurl);
//            }

            if($model->save()){
                $images = CUploadedFile::getInstancesByName('images');

                if (isset($images) && count($images) > 0) {
                    foreach ($images as $k => $image) {
                        $imgUrl = Upload::createFile($image, 'book', 'create');
                        $m = new BookImage();
                        $m->bookid = $model->id;
                        $m->imgurl = $imgUrl;
                        $m->iscover = 1;
                        $m->save();
                    }

                    // 更新主表封面图信息
                    $model->hascover = 1;
                    $model->save();
                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
                $this->redirect(array('index','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
                $this->redirect(array('index','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
            }
        }

        $bookImages = BookImage::model()->findAll('bookid=:bookid', array(
            ':bookid' => $model->id,
        ));
        $this->render('book/update',array(
            'model'=>$model,
            'bookimages' => $bookImages,
            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * AJAX删除上传图片
     * @param $id
     */
    public function actionDeleteBookImage($id)
    {
        $m = BookImage::model()->findByPk((int)$id);
        if ($m) {
            Upload::deleteFile($m->imgurl);
            $m->delete();
        }

        echo "1";

        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadBookModel($id)
    {
        $model=Book::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}