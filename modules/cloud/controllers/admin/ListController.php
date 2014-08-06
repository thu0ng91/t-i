<?php
/**
 * 云中心
 * Class ListController
 */
class ListController extends FWAdminController
{
    /**
     * 云中心
     */
    public function actionIndex()
    {
      $this->render('index');
    }

    /**
     * 模板中心
     */
    public function actionTemp()
    {
        $this->render('temp');
    }
	 /**
     * 插件中心
     */
	public function actionPlugin(){
		$this->render('plugin');
	}
	/**
     * 插件中心
     */
	public function actionHelp(){
		$this->render('help');
	}
}