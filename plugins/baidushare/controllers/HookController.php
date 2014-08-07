<?php
/**
 * Created by JetBrains PhpStorm.
 * User: think
 * Date: 14-7-5
 * Time: 下午4:23
 * To change this template use File | Settings | File Templates.
 */

class HookController extends FWPluginFrontController {

    public function actionIndex()
    {

        $this->render('index');
    }

    public function onBookIndexShare()
    {
        $this->renderPartial("index");
    }

}