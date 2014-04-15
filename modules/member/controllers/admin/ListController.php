<?php
/**
 * 会员管理
 * Class ListController
 */
class ListController extends FWAdminController
{
    /**
     * 会员列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
    //        $criteria->addCondition('status=:stauts');
    //        $criteria->params[':status'] = Yii::app()->params['status']['ischecked'];

      if(!empty($_GET['Member']['username']))
          $criteria->addSearchCondition('username',$_GET['Member']['username']);

//      if(!empty($_GET['Member']['author']))
//          $criteria->addSearchCondition('author',$_GET['Member']['author']);

//      if(!empty($_GET['Member']['cid'])){
//          $categoryList=array();
//          $categoryList[] = $_GET['Member']['cid'];
//          Category::model()->getAllCategoryIds($categoryList,Category::model()->findAll(), $_GET['Member']['cid']);
//          $criteria->addInCondition('cid',$categoryList);
//      }

//      if(isset($_GET['Member']['recommendlevel'])){
//          $criteria->compare('recommendlevel', $_GET['Member']['recommendlevel']);
//      }

        if(isset($_GET['Member']['status'])){
            $criteria->compare('status', $_GET['Member']['status']);
        } else {
            $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));
        }

      $dataProvider=new CActiveDataProvider('Member',array(
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
          'model' => Member::model(),
      ));
    }

    /**
     * 会员创建
     */
    public function actionCreate()
    {
        $model=new Member;
//        $cid=$_GET['cid'];
//        if(!empty($cid))
//            $model->cid=$cid;
        if(isset($_POST['Member']))
        {
            $model->attributes=$_POST['Member'];
//            $upload = CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','create');
//            }
            $attributes = array(
                'username',
                'password',
                'repassword',
                'email',
                'status',
            );

            if($model->save(true, $attributes)){
//                // 保存 tags
//                $tagIdList = $_POST['book_tags'];
//                $tagIdList = explode(",", $tagIdList);
//                foreach ($tagIdList as $v) {
//                    if (!is_numeric($v) || $v < 1) continue;
//                    $m = new MemberTags();
//                    $m->bookid = $model->id;
//                    if ($v > 0) $m->tagid = intval($v);
//                    $m->save();
//                }
//
//                $images = CUploadedFile::getInstancesByName('images');
//
//                if (isset($images) && count($images) > 0) {
//                    foreach ($images as $k => $image) {
//                        $imgUrl = Upload::createFile($image, 'book', 'create');
//                        $m = new MemberImage();
//                        $m->bookid = $model->id;
//                        $m->imgurl = $imgUrl;
//                        $m->iscover = 1;
//                        $m->save();
//                    }
//
//                    // 更新主表封面图信息
//                    $model->hascover = 1;
//                    $model->update(array(
//                        'hascover',
//                    ));
//                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        $this->render('create',array(
            'model'=>$model,
//            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 会员更新
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        if(!empty($_POST['Member']))
        {
            $model->attributes=$_POST['Member'];
//            $upload=CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','update',$model->imgurl);
//            }

//            if (strlen($_POST['Member']['password']))

            $attributes = array(
//                'username',
                'password',
                'repassword',
                'email',
                'status',
            );
            $s = str_pad("*", 32 , "*");
            if ($_POST['Member']['password'] == $s) { // 表示不更新密码
                unset($attributes[0], $attributes[1]);
            }
            if($model->save(true, $attributes)){
//                // 保存新增tags
//                $tagIdList = $_POST['book_tags'];
//                $tagIdList = explode(",", $tagIdList);
//                foreach ($tagIdList as $v) {
//                    if (!is_numeric($v) || $v < 1) continue;
//                    $m = new MemberTags();
//                    $m->bookid = $model->id;
//                    if ($v > 0) $m->tagid = intval($v);
//                    $m->save();
//                }
//
//                $images = CUploadedFile::getInstancesByName('images');
//
//                if (isset($images) && count($images) > 0) {
//                    foreach ($images as $k => $image) {
//                        $imgUrl = Upload::createFile($image, 'book', 'create');
//                        $m = new MemberImage();
//                        $m->bookid = $model->id;
//                        $m->imgurl = $imgUrl;
//                        $m->iscover = 1;
//                        $m->save();
//                    }
//
//                    // 更新主表封面图信息
//                    $model->hascover = 1;
//                    $model->update(array(
//                        'hascover',
//                    ));
//                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }
        }

//        $bookImages = MemberImage::model()->findAll('bookid=:bookid', array(
//            ':bookid' => $model->id,
//        ));
        $this->render('update',array(
            'model'=>$model,
//            'bookimages' => $bookImages,
//            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=Member::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
}