<?php
/**
 * 区块管理
 * Class ListController
 */
class ListController extends FWAdminController
{
    /**
     * 区块列表
     */
    public function actionIndex()
    {
      $criteria=new CDbCriteria();
      $dataProvider=new CActiveDataProvider('Block',array(
          'criteria'=>$criteria,
          'pagination'=>array(
              'pageSize'=> $this->module['admin']['list_count'],
          ),
          'sort'=>array(
              'defaultOrder'=>array(
                  'bid' => CSort::SORT_DESC,
              ),
          ),
      ));
      $this->render('index',array(
          'dataProvider'=>$dataProvider,
//          'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
          'model' => Block::model(),
      ));
    }

    /**
     * 区块创建
     */
    public function actionCreate()
    {
    	$type = Yii::app()->request->getParam('type',null);
    	if(null == $type || !isset(Yii::app()->controller->module['blocktype'][$type])){//如果区块类型为空或者不存在，重置类型为小说类型
    		$type = 'novel';
    	}
		$bid = Yii::app()->request->getParam('bid',null);
		$result = $vars = array();
        if(null == $bid){
        	$model = new Block;
        }else{
        	$model = Block::model()->findByPk($bid);
        	$vars = explode('|',$model->vars);
        }
		

        if(isset($_POST['Block']))
        {
        	if($_POST['Block']['blocktype'] == 'novel'){
        		$_POST['Block']['vars'] = intval($_POST['sort_id']).'|'.intval($_POST['sort_type']).'|'.intval($_POST['sort_order']).'|'.intval($_POST['nums']);
        	}
            $model->attributes = $_POST['Block'];

            if($model->save(true, $attributes)){
            	$block_file_path = Yii::app()->basePath.'/../../runtime/blocks/block_'.$model->bid.'.tpl';
            	file_put_contents($block_file_path,$model->content);
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }else if($model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            }
        }
        $categories = null;
		if($type == 'novel'){
			Yii::import('book.models.*');
	        $category = Category::model()->findAllByAttributes(array('status'=>1));
	        foreach($category as $v){
	        	$result[$v->id] = $v->title;
	        	$categories = $result;
	        }
		}
        
        $this->render('create',array(
            'model'=>$model,'categories'=>Category::model()->showAllSelectCategory(Category::ALL_CATEGORY),'type'=>$type,'vars'=>$vars
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