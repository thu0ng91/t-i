<?php
/**
 * App 行为控制
 * Class ApplicationBehavior
 */
class FrontAppBehavior extends CBehavior {

    public function events()
    {
        return array_merge(parent::events(),array(
            'onBeginRequest' => 'beginRequest'
        ));
    }

    public function beginRequest($event) {
//        echo "Hello this Behavior beginRequest";
//        $this->owner->urlManager->urlSuffix = ".html";
//        unset($this->owner->urlManager->rules['login']);
//var_dump(get_class($this->owner->viewRenderer));
//        $rules = Yii::app()->urlManager->rules;
//        Yii::app()->urlManager->rules = array();

//        var_dump($rules);
        //Yii::app()->urlManager->rules = array();
        if (!H::checkIsInstall()) return;

        $m = Yii::app()->settings->get("SystemBaseConfig");
        if ($m) {
            // 网站标题
            Yii::app()->name = $m->SiteName;
            // 主题控制
            Yii::app()->theme = $m->SiteTheme;
            // 设定全局 smarty 变量
//            Yii::app()->viewRenderer->smarty->assign("siteinfo", $m);
        }

        // Url 重写
        $m = Yii::app()->settings->get("SystemRewriteConfig");
        if ($m) {
            if ($m->UrlSuffix >= 0) {
                Yii::app()->urlManager->urlSuffix = Yii::app()->params['urlSuffix'][$m->UrlSuffix];
            }

//            if ($m->CategoryRule) {
//                $r = $m->CategoryRule;
//                $r = str_replace('{shorttitle}', '<title:\w+>', $r);
//                $r = array( $r =>  'category/index');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//            if ($m->BookDetailRule) {
//                $r = $m->BookDetailRule;
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'book/view');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//            if ($m->ChapterDetailRule) {
//                $r = $m->ChapterDetailRule;
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'article/view');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->NewsListRule) {
//                $r = $m->NewsListRule;
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'news/index');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->NewsDetailRule) {
//                $r = $m->NewsDetailRule;
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'news/view');
//                Yii::app()->urlManager->addRules($r, false);
//            }
        }

        // 动态加载模块
        // @todo 可从缓存中加载
        $modules = Modules::model()->findAll("status=:status", array(
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        $loadModules = array();
        foreach ($modules as $m) {
            $loadModules[] = $m->name;
//            Yii::app()->setModules($m->name);
        }
//        var_dump($this);
        Yii::app()->setModules($loadModules);

        foreach ($loadModules as $m) {
            Yii::app()->getModule($m);
        }

        // 加载所有插件的hook
        $plugins = Plugins::model()->findAll("status=:status", array(
            ':status' => Yii::app()->params['status']['ischecked'],
        ));
        foreach ($plugins as $m) {
            include_once FW_PLUGIN_BASE_PATH . DS . $m->name . DS . "hook.php";
        }
    }
}