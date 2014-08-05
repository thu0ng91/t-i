<?php
/**
 * 小说缓存配置
 * Class BookController
 */
class CacheconfigController extends FWModuleAdminController
{
    public function actionIndex()
    {
        $cacheCategory =  'book-cache';
        $model = new BookCacheConfig();

        if(isset($_POST['BookCacheConfig']))
        {
            $model->attributes = $_POST['BookCacheConfig'];

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
        $this->render('index',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 小说缓存清理
     */
    public function actionClear()
    {
        $this->render('clear');
    }

    /**
     * 清除缓存
     */
    public function actionDoClear()
    {
        $type = $_REQUEST['type'];
        $key = "__FWOutputCache";

        switch ($type) {
            case 'category':
                $key .= "book-category-index" . $_REQUEST['title'];
                Yii::app()->cache->set($key, time());
                break;
            case 'book':
                $key .= "book-detail-index" . $_REQUEST['bookid'];
                Yii::app()->cache->set($key, time());
                break;
            case 'chapter':
                $key .= "chapter-index" . $_REQUEST['bookid'] . $_REQUEST['chapterid'];
                Yii::app()->cache->set($key, time());
                break;
            case 'rank':
                $key .= "book-rank";
                Yii::app()->cache->set($key, time());
                break;
            case 'lastupdate':
                $key .= "book-lastupdate";
                Yii::app()->cache->set($key, time());
                break;
        }

        $this->jsonOutput(true);
    }

}