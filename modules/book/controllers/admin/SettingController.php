<?php
/**
 * 小说设置
 * Class BookController
 */
class SettingController extends FWModuleAdminController
{
    /**
     * 重写配置
     */
    public function actionRewrite()
    {
        $cacheCategory =  'book';
        $model = new BookRewriteConfig();

        if(isset($_POST['BookRewriteConfig']))
        {
            $model->attributes = $_POST['BookRewriteConfig'];

            if(!$model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            } else {
//                foreach ($model->attributes as $k => $v) {
//                    Yii::app()->settings->set($k, $v, $cacheCategory);
//                }

                Yii::app()->settings->set(get_class($model), $model, $cacheCategory);
                Yii::app()->settings->deleteCache($cacheCategory);
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }
        } else {
//            foreach ($model->attributes as $k => $v) {
//                $model->$k = Yii::app()->settings->get($k, $cacheCategory);
//            }
            $m = Yii::app()->settings->get(get_class($model), $cacheCategory);
            if ($m) {
                $model = $m;
            }
        }
        $this->render('rewrite',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 生成静态化配置
     */
    public function actionMakeHtml()
    {
        $cacheCategory =  'book-config-makehtml';
        $model = new BookHtmlConfig();

        if(isset($_POST['BookHtmlConfig']))
        {
            $model->attributes = $_POST['BookHtmlConfig'];

            if(!$model->validate()){
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveFail']);
                $this->refresh();
            } else {
//                foreach ($model->attributes as $k => $v) {
//                    Yii::app()->settings->set($k, $v, $cacheCategory);
//                }

                Yii::app()->settings->set(get_class($model), $model, $cacheCategory);
                Yii::app()->settings->deleteCache($cacheCategory);
                Yii::app()->user->setFlash('actionInfo',Yii::app()->params['actionInfo']['saveSuccess']);
                $this->refresh();
            }
        } else {
//            foreach ($model->attributes as $k => $v) {
//                $model->$k = Yii::app()->settings->get($k, $cacheCategory);
//            }
            $m = Yii::app()->settings->get(get_class($model), $cacheCategory);
            if ($m) {
                $model = $m;
            }
        }
        $this->render('makehtml',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }
}