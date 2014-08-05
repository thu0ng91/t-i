<?php
/**
 * 模块级后台控制器基类
 * Class FWModuleFrontController
 * @author pizigou<pizigou@yeah.net>
 */
class FWModuleAdminController extends FWAdminController {
    /**
     * 顶部菜单标示
     * @return array
     */
    protected function menus()
    {
        return array(
            'extend'
        );
    }
}