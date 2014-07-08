<?php
/**
 * Created by JetBrains PhpStorm.
 * User: think
 * Date: 14-7-5
 * Time: 下午4:23
 * To change this template use File | Settings | File Templates.
 */

class SiteController extends FWPluginFrontController {

    public function actionIndex()
    {

        $this->render('index');
    }

    public function onRegister(FWHookEvent $evt)
    {
//        $this->renderPartial("index");
    }

}