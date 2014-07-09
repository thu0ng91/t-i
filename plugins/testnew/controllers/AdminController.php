<?php
/**
 * 演示插件
 * Class AdminController
 */
class AdminController extends FWPluginAdminController {

    public function actionIndex()
    {
        $this->render("index");
    }

    public function actionTip()
    {
        $this->render("tip");
    }
}