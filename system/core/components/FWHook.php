<?php
/**
 * 插件核心处理模块
 * Class FWHook
 */
class FWHook  {

    private static $_hooks = array();

    /**
     * 安装钩子
     * @param $hookPoint
     * @param $plugin
     * @param $pluginController
     * @param $pluginMethod
     */
    public static function install($hookPoint, $plugin, $pluginController, $pluginMethod) {

        if (!isset(self::$_hooks[$hookPoint])) {
            self::$_hooks[$hookPoint] = array();
        }
        self::$_hooks[$hookPoint][] = array($plugin, $pluginController, $pluginMethod);
    }

    /**
     * 执行注册的钩子
     * @param $hookPoint
     */
    public static function run($hookPoint) {
        if (isset(self::$_hooks[$hookPoint])) {
            foreach (self::$_hooks[$hookPoint] as $v) {
//                call_user_func_array($func, array($evt));
                $id = "plugin" . $v[0] . $v[1];
                if (isset(Yii::app()->controllerMap[$id])) {
//                    var_dump(Yii::app()->controllerMap[$id]);
                    $c = Yii::createComponent(Yii::app()->controllerMap[$id],$id,null);
                    $c->init();

                    if (method_exists($c, $v[2])) {
//                        $c->$v[2]();
                        call_user_func_array(array($c, $v[2]), array());
                    }
                }
            }
        }
    }
}