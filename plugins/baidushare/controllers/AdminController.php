<?php
/**
 * 演示插件
 * Class AdminController
 */
class AdminController extends FWPluginAdminController {

    public function actionIndex()
    {
    	$cacheCategory =  'baidushare';
    	$data = Yii::app()->cache->get($cacheCategory);
    	if($_POST){    		
    		Yii::app()->cache->set($cacheCategory,$_POST['content']);
    		Yii::app()->user->setFlash('actionInfo','设置成功');
            $this->refresh();
    	}
        $this->render("index",array('data'=>$data));
    }
}