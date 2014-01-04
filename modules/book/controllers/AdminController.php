<?php

class AdminController extends FWAdminController
{
  public function actionIndex()
  {
      $m = Book::model()->findByPk(1);

      var_dump($m);
      $this->render("index");
  }
}