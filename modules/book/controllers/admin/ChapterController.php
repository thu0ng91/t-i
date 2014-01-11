<?php
/**
 * 章节管理
 * Class ChapterController
 */
class ChapterController extends FWAdminController
{
//    protected function menus()
//    {
//        return array(
//            'book',
//        );
//    }

	/**
	 * Lists all models.
	 */
	public function actionIndex($bookid)
	{
        $book = Book::model()->findByPk($bookid);

		$criteria=new CDbCriteria();

        if(!empty($_GET['Chapter']['title']))
            $criteria->addSearchCondition('title',$_GET['Chapter']['title']);

        if(!empty($_GET['Chapter']['chapterorder']))
            $criteria->addSearchCondition('chapterorder',$_GET['Chapter']['chapterorder']);

        $criteria->compare('bookid', $bookid);
//        $criteria->compare('status', Yii::app()->params['status']['ischecked']);

	    $dataProvider = new CActiveDataProvider('Chapter',array(
			'criteria'=> $criteria,
			'pagination'=>array(
        		'pageSize'=>Yii::app()->params['girdpagesize'],
    		),
            'sort'=>array(
                'defaultOrder'=>array(
                    'chapterorder' => CSort::SORT_DESC,
                ),
                'attributes'=>array(
                    'chapterorder',
                    'createtime',
                ),
            ),
		));


		$this->render('index',array(
			'dataProvider'=> $dataProvider,
            'model' => Chapter::model(),
            'book' => $book,
//			'categorys'=> Category::model()->showAllSelectCategory(Yii::app()->params['module']['article'],Category::SHOW_ALLCATGORY),
		));
	}

	public function actionCreate($bookid)
	{
		$model = new Chapter;

        $book = Book::model()->findByPk($bookid);

        if (!$book) {
            Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
            $this->redirect($this->createUrl('book/index'));
        }

        $model->bookid = $bookid;

//        $model->chapternum = $book->chaptercount + 1;

		if(isset($_POST['Chapter']))
		{
			$model->attributes = $_POST['Chapter'];
//			$upload = CUploadedFile::getInstance($model,'imagefile');
//			if(!empty($upload))
//			{
//				$model->imgurl=Upload::createFile($upload,'article','create');
//			}

			if($model->save()){
                // 更新最后章节信息
//                $book->updateLastChapter($model);
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
				$this->refresh();
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
				$this->refresh();
			}
		}

		$this->render('create',array(
			'model' => $model,
            'book' => $book,
            'volumes' => $this->getVolumes($book->id),
//			'categorys'=>Category::model()->showAllSelectCategory(Yii::app()->params['module']['article']),
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		if(!empty($_POST['Chapter']))
		{
			$model->attributes=$_POST['Chapter'];

			if($model->save()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateSuccess']);
				$this->refresh();
//				$this->redirect(array('index','menupanel'=>$_GET['menupanel'],'bid'=>$_GET['bid'],'title'=>$_GET['title']));
			}else if($model->validate()){
				Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['updateFail']);
                $this->refresh();
//				$this->redirect(array('index','menupanel'=>$_GET['menupanel'],'bid'=>$_GET['bid'],'title'=>$_GET['title']));
			}
		}

        $book = Book::model()->findByPk($model->bookid);

		$this->render('update',array(
			'model'=>$model,
            'book' => $book,
            'volumes' => $this->getVolumes($book->id),
//			'categorys'=>Category::model()->showAllSelectCategory(Yii::app()->params['module']['article']),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Chapter::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

    /**
     * 取得所有分卷hashmap
     * @param $bookid
     * @return array|CActiveRecord|mixed|null
     */
    public function getVolumes($bookid)
    {
        $l = Volume::model()->findAll('bookid=:bookid', array(
            ':bookid' => $bookid,
        ));
        $volumes = array();
        foreach ($l as $v) {
            $volumes[$v->id] = $v->title;
        }
        return $volumes;
    }

}
