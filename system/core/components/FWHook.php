<?php
/**
 * 插件核心处理模块
 * Class FWHook
 */
class FWHook  {

    private static $_hooks = array();

    /**
     * 安装钩子
     * @param $namespace
     * @param $hookPoint
     * @param $plugin
     * @param $pluginController
     * @param $pluginMethod
     */
    public static function install($namespace, $hookPoint, $plugin, $pluginController, $pluginMethod) {
        if (!isset(self::$_hooks[$namespace])) {
            self::$_hooks[$namespace] = array();
        }
        if (!isset(self::$_hooks[$namespace][$hookPoint])) {
            self::$_hooks[$namespace][$hookPoint] = array();
        }
        self::$_hooks[$namespace][$hookPoint][] = array($plugin, $pluginController, $pluginMethod);
    }

    /**
     * 执行注册的钩子
     * @param $namespace
     * @param $hookPoint
     * @param FWHookEvent $evt
     */
    public static function run($namespace, $hookPoint, FWHookEvent $evt) {
        if (is_array(self::$_hooks[$namespace]) && isset(self::$_hooks[$namespace][$hookPoint])) {
            foreach (self::$_hooks[$namespace][$hookPoint] as $v) {
//                call_user_func_array($func, array($evt));
                $id = "plugin" . $v[0] . $v[1];
                if (isset(Yii::app()->controllerMap[$id])) {
                    $c = Yii::createComponent(Yii::app()->controllerMap[$id],$id,null);
                    $c->init();
                    if (method_exists($c, $v[2])) {
                        $c->$v[2]($evt);
                    }
                }
            }
        }
    }
}