<?php
/**
 * 章节管理
 * Class ChapterController
 */
class ChapterController extends FWModuleAdminController
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
        $criteria->compare('chaptertype', 0);
//        $criteria->compare('status', Yii::app()->params['status']['ischecked']);

	    $dataProvider = new FWChapterDataProvider(Chapter::customModel($bookid),array(
			'criteria'=> $criteria,
			'pagination'=>array(
                'pageSize'=> $this->module['admin']['list_count'],
    		),
            'sort'=>array(
//                'class' => 'FWChapterOrder',
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
            'model' => Chapter::customModel($bookid),
            'book' => $book,
//			'categorys'=> Category::model()->showAllSelectCategory(Yii::app()->params['module']['article'],Category::SHOW_ALLCATGORY),
		));
	}

	public function actionCreate($bookid)
	{
		$model = Chapter::customNew($bookid);

        $book =Book::model()->findByPk($bookid);

        if (!$book) {
            Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
            $this->redirect($this->createUrl('book/index'));
        }

        $model->bookid = $bookid;
        $model->chaptertype = 0;

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
	public function actionUpdate($id, $bookid)
	{
		$model=$this->loadModel($id, $bookid);
		if(!empty($_POST['Chapter']))
		{
            $model->chaptertype = 0;
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
     * ajax 移动章节
     */
    public function actionMove()
    {
        $chapter = $this->loadModel($_REQUEST['id'], $_REQUEST['bookid']);

        $this->layout = "main-clean";

        if (Yii::app()->request->isPostRequest) {


            $selChapter = Chapter::customModel($chapter->bookid)->findByPk($_POST['select_chapter_id']);

            $selChapterOrder = $selChapter->chapterorder;

            $pos = $_POST['pos'];

            if ($pos == 'before') {
                // 插入到当前选中章节之前
                Chapter::customModel($chapter->bookid)->updateCounters(array(
                    'chapterorder' => 1,
                ), 'chapterorder>=:chapterorder', array(
                   ':chapterorder' =>  $selChapterOrder,
                ));
                $chapter->chapterorder = $selChapterOrder;

                $chapter->update(array(
                    'chapterorder',
                ));
            } else {
                // 插入到当前选中章节之后
                Chapter::customModel($chapter->bookid)->updateCounters(array(
                    'chapterorder' => 1,
                ), 'chapterorder>:chapterorder', array(
                    ':chapterorder' =>  $selChapterOrder,
                ));
                $chapter->chapterorder = $selChapterOrder + 1;

                $chapter->update(array(
                    'chapterorder',
                ));
            }

            $this->render("move_successfull");

            Yii::app()->end();
        }
        $crit = new CDbCriteria();
        $crit->order = "chapterorder asc";
        $chapterList = Chapter::customModel($_REQUEST['bookid'])->findAll($crit);
        $this->render("move", array(
            'chapter' => $chapter,
            'chapterList' => $chapterList,
        ));
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
        $model->content = $model->getContentFromFile();
        
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
        $l = Chapter::customModel($bookid)->findAll('bookid=:bookid and chaptertype=1', array(
            ':bookid' => $bookid,
        ));
        $volumes = array();
        foreach ($l as $v) {
            $volumes[$v->id] = $v->title;
        }
        return $volumes;
    }
	public function actionDelall() {
        if (Yii::app()->request->isPostRequest) {
        	$bookid = intval($_GET['id']);
            //$criteria = new CDbCriteria;
            //$criteria->addInCondition('id', $_POST['id']);
            //Chapter::customModel()->deleteAll($criteria); //News换成你的模型
            foreach($_POST['id'] as $v){
            	$this->loadModel($v, $bookid)->delete();
            }

            if (isset(Yii::app()->request->isAjaxRequest)) {
                echo CJSON::encode(array('success' => true));
            } else
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }
}
