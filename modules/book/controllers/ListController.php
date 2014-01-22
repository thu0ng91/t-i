<?php
/**
 * 小说分类
 * Class ListController
 */
class ListController extends FWFrontController
{
  public function actionIndex()
  {

      $category = Category::model()->find('shorttitle=:title', array(
          ':title' => $_GET['title']
      ));

      $criteria = new CDbCriteria();
      $criteria->compare("cid", $category->id);
      $criteria->compare("status", Yii::app()->params['status']['ischecked']);

      $criteria->order = "createtime desc";

      $count=Book::model()->count($criteria);
      $pages=new CPagination($count);

      // results per page
      $pages->pageSize= $this->module['front']['category_list_count'];
      $pages->applyLimit($criteria);

      $list =Book::model()->findAll($criteria);

//      var_dump($list);

      $this->assign("list", $list);
      $this->assign("pages", $pages);
      $this->assign("keywords", "just for test");

//      print_r(Yii::app()->hasModule("test"));
//      $this->renderPartial("index");
      $this->render("index");
  }
}