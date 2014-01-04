<?php

class SiteController extends FWFrontController
{
  public function actionIndex()
  {
//    echo "test";exit;


      print_r(Yii::app()->hasModule("test"));
//      $this->renderPartial("index");
      $this->render("index");
  }
}