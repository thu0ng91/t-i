<?php
/**
 * 小说分类
 * Class ListController
 */
class ListController extends FWFrontController
{
  public function actionIndex()
  {
//    echo "test";exit;

//      var_dump($_GET['title']);exit;

      $list = Category::model()->find('shorttitle=:title', array(
          ':title' => $_GET['title']
      ));

//      var_dump($list);

//      print_r(Yii::app()->hasModule("test"));
//      $this->renderPartial("index");
      $this->render("index");
  }
}