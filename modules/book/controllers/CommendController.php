<?php
/**
 * 评论模块
 * @author go123
 *
 */
class CommendController extends FWModuleFrontController {

	public function actionAjaxsubmitcommend(){
		$book_id = intval(Yii::app()->request->getParam('bookid',null));
		$book = Book::model()->findByPk($book_id);
		if(null == $book){
			echo '小说不存在';
			Yii::app()->end();
		}
		$uid = Yii::app()->user->id;
		if(!$uid){
			echo '请先登录';
			Yii::app()->end();
		}
		$content = CHtml::encode(Yii::app()->request->getParam('content',null));
		//$content = Yii::app()->request->getParam('content',null);
		if(!$content){
			echo '内容不能为空';
			Yii::app()->end();
		}
		$username = Yii::app()->user->name;
		$nowtime = time();
		$model = new Comment();
		$model->uid = $uid;
		$model->username = $username;
		$model->book_id = $book_id;
		$model->content = $content;
		$model->digest = 0;
		$model->recommends = 0;
		$model->status = 1;
		$model->dateline = $nowtime;
		if($model->validate()){
			$model->save();
			echo '1';Yii::app()->end();
		}else{
			echo '2';Yii::app()->end();
		}
	}
}