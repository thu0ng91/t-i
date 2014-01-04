<?php

class AdminController extends FWAdminController
{
  public function actionIndex()
  {
      $this->render("index");
  }
}