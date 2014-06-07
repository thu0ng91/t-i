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
     * @param $func
     */
    public static function install($namespace, $hookPoint, $func) {
        if (!isset(self::$_hooks[$namespace])) {
            self::$_hooks[$namespace] = array();
        }
        if (!isset(self::$_hooks[$namespace][$hookPoint])) {
            self::$_hooks[$namespace][$hookPoint] = array();
        }
        self::$_hooks[$namespace][$hookPoint][] = $func;
    }

    /**
     * 执行注册的钩子
     * @param $namespace
     * @param $hookPoint
     * @param FWHookEvent $evt
     */
    public static function run($namespace, $hookPoint, FWHookEvent $evt) {
        if (is_array(self::$_hooks[$namespace]) && !isset(self::$_hooks[$namespace][$hookPoint])) {
            foreach (self::$_hooks[$namespace][$hookPoint] as $func) {
                call_user_func_array($func, array($evt));
            }
        }
    }
}