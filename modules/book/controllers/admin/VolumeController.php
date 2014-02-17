<?php
/**
 * 分卷分卷管理
 * Class ChapterController
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

//      if(!empty($_GET['Chapter']['title']))
//          $criteria->addSearchCondition('title',$_GET['Chapter']['title']);
//
//      if(!empty($_GET['Chapter']['author']))
//          $criteria->addSearchCondition('author',$_GET['Chapter']['author']);
//
//      if(!empty($_GET['Chapter']['cid'])){
//          $categoryList=array();
//          $categoryList[] = $_GET['Chapter']['cid'];
//          Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll(), $_GET['Chapter']['cid']);
//          $criteria->addInCondition('cid',$categoryList);
//      }
//        $criteria->compare("bookid", $bookid);
        $book = Book::model()->findByPk($bookid);

//      if(isset($_GET['Chapter']['recommendlevel'])){
//          $criteria->compare('recommendlevel', $_GET['Chapter']['recommendlevel']);
//      }
//
        $criteria->compare('bookid', $bookid);
        $criteria->compare("chaptertype", 1);
//      $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));


      $dataProvider=new FWChapterDataProvider(Chapter::customModel($bookid),array(
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
//          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
//          'model' => Chapter::customModel($bookid),
          'book' => $book
      ));
    }

    /**
     * 分卷创建
     */
    public function actionCreate($bookid)
    {
        $model= Chapter::customNew($bookid);
        $model->chaptertype = 1;
        $book = Book::model()->findByPk($bookid);

//        $cid=$_GET['cid'];
        if($book)
            $model->bookid=$bookid;

        if(isset($_POST['Chapter']))
        {
            $model->attributes=$_POST['Chapter'];
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
    public function actionUpdate($id, $bookid)
    {
        $model=$this->loadModel($id, $bookid);
        $book = Book::model()->findByPk($bookid);
        if(!empty($_POST['Chapter']))
        {
            $model->attributes=$_POST['Chapter'];
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

//        $bookImages = ChapterImage::model()->findAll('bookid=:bookid', array(
//            ':bookid' => $model->id,
//        ));
        $this->render('update',array(
            'model'=>$model,
//            'bookimages' => $bookImages,
//            'categorys'=>Category::model()->showAllSelectCategory(),
            'book' => $book,
        ));
    }

    /**
     * 删除分卷
     * @param int $id
     * @param $bookid
     * @throws CHttpException
     */
    public function actionDelete($id, $bookid)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            if($this->loadModel($id, $bookid)->delete()){
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
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id, $bookId = 0)
    {
        if ($bookId > 0) {
            $model = Chapter::customModel($bookId)->findByPk((int)$id);
        } else {
            $model=Chapter::model()->findByPk((int)$id);
        }
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}