<?php

class HookController extends FWPluginFrontController {

    public function actionIndex()
    {
        $this->render('index');
    }

    public function onBookIndexShare()
    {
    	$cacheCategory =  'baidushare';
		$data = Yii::app()->cache->get($cacheCategory);

        $this->renderPartial('index',array('data'=>$data));
    }

}