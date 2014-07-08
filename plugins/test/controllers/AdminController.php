<?php
/**
 * Class AdminController
 */
class AdminController extends FWPluginAdminController {

    public function actionIndex()
    {
        $this->render("index");
    }
}