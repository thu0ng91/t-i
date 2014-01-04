<?php
/**
 * App 行为控制
 * Class ApplicationBehavior
 */
class AdminAppBehavior extends CBehavior {

    public function events()
    {
        return array_merge(parent::events(),array(
            'onBeginRequest' => 'beginRequest'
        ));
    }

    public function beginRequest($event)
    {
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
        Yii::app()->setModules($loadModules);
    }

}