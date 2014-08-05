<?php
/**
 * 小说管理
 * Class BookController
 */
class BookController extends FWModuleAdminController
{
    /**
     * 小说列表
     */
    public function actionIndex()
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

        if(isset($_GET['Book']['status'])){
            $criteria->compare('status', $_GET['Book']['status']);
        } else {
            $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));
        }

      $dataProvider=new CActiveDataProvider('Book',array(
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
          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Book::model(),
      ));
    }

    /**
     * 小说创建
     */
    public function actionCreate()
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
                // 保存 tags
                $tagIdList = $_POST['book_tags'];
                $tagIdList = explode(",", $tagIdList);
                foreach ($tagIdList as $v) {
                    if (!is_numeric($v) || $v < 1) continue;
                    $m = new BookTags();
                    $m->bookid = $model->id;
                    if ($v > 0) $m->tagid = intval($v);
                    $m->save();
                }

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
                    $model->update(array(
                        'hascover',
                    ));
                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        $this->render('create',array(
            'model'=>$model,
            'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 小说更新
     * @param $id
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);
        if(!empty($_POST['Book']))
        {
            $model->attributes=$_POST['Book'];
//            $upload=CUploadedFile::getInstance($model,'imagefile');
//            if(!empty($upload))
//            {
//                $model->imgurl = Upload::createFile($upload,'book','update',$model->imgurl);
//            }

            if($model->save()){
                // 保存新增tags
                $tagIdList = $_POST['book_tags'];
                $tagIdList = explode(",", $tagIdList);
                foreach ($tagIdList as $v) {
                    if (!is_numeric($v) || $v < 1) continue;
                    $m = new BookTags();
                    $m->bookid = $model->id;
                    if ($v > 0) $m->tagid = intval($v);
                    $m->save();
                }

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
                    $model->update(array(
                        'hascover',
                    ));
                }

                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
//                $this->redirect(array('bookList','menupanel'=>$_GET['menupanel'],'cid'=>$_GET['cid'],'title'=>$_GET['title']));
                $this->refresh();
            }
        }

//        $bookImages = BookImage::model()->findAll('bookid=:bookid', array(
//            ':bookid' => $model->id,
//        ));
        $this->render('update',array(
            'model'=>$model,
//            'bookimages' => $bookImages,
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

            // 当删除了所有图片时，调整小说封面图状态
            if (!BookImage::model()->exists('bookid=:bookid and iscover=:iscover', array(
                ':bookid' => $m->bookid,
                ':iscover' => 1,
            ))) {
                Book::model()->updateByPk($m->bookid, array(
                   'hascover' => 0,
                ));
            }
            $m->delete();
        }

        echo "1";

        Yii::app()->end();
    }

    /**
     * ajax 创建tag 并返回tag 编号
     * 在新建书籍：书籍编号还不存在时调用
     */
    public function actionAjaxCreateTag()
    {
        $tagName = $_REQUEST['tag'];

        $tag = Tags::model()->find("name=:name", array(
           ':name' => $tagName,
        ));
        if (!$tag) {
            $tag = new Tags();
            $tag->name = $tagName;
            $tag->save();
        }

        $this->jsonOuputAndEnd(true, $tag->id);
    }

    /**
     * ajax 删除tag
     * 在新建 or 编辑书籍时调用
     * 输出tag编号
     */
    public function actionAjaxDeleteTag()
    {
        $tagName = $_REQUEST['tag'];
        $bookId = $_REQUEST['bookid'];

        if ($bookId < 1) $this->jsonOuputAndEnd(false);

        $tag = Tags::model()->find("name=:name", array(
            ':name' => $tagName,
        ));
        if (!$tag) {
            $this->jsonOuputAndEnd(false);
        }

        BookTags::model()->deleteAll("tagid=:tagid and bookid=:bookid", array(
            ":tagid" => $tag->id,
            ":bookid" =>  $bookId,
        ));

        $this->jsonOuputAndEnd(true, $tag->id);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=Book::model()->findByPk((int)$id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }
	public function actionDelall() {
        if (Yii::app()->request->isPostRequest) {
            $criteria = new CDbCriteria;
            $criteria->addInCondition('id', $_POST['id']);
            Book::model()->deleteAll($criteria); //News换成你的模型

            if (isset(Yii::app()->request->isAjaxRequest)) {
                echo CJSON::encode(array('success' => true));
            } else
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
}