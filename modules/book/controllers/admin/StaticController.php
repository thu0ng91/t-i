<?php
class StaticController extends FWModuleAdminController{
	public function actionIndex(){
		$this->render('index');
	}
	public function actionUpdate(){
		$beginid = Yii::app()->getRequest()->getParam('beginid',null);
		$endid = Yii::app()->getRequest()->getParam('endid',null);
		$type = Yii::app()->getRequest()->getParam('type',null);
		
		for($i=$beginid;$i<=$endid;$i++){
			$model = Book::model()->findByPk($i);

			if(NULL != $model){
				$this->makehtml($i);
			}else{
				echo 2;
			}	
		}
exit;
		H::showmsg('批量生成成功',Yii::app()->createUrl('book/admin/update'));
	}
	
	private function makehtml($bookid){
		$oldmodel = $newmodel = $criteria = $v = null;
		$criteria = new CDbCriteria();
        $criteria->compare("bookid", $bookid);
        $criteria->order = "chapterorder asc";

        $oldmodel = Chapter::customModel($bookid)->findAll($criteria);

		foreach ($oldmodel as $v){
echo $v->title;
		}
		exit;
	}
}