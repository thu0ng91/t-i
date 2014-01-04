<?php
/**
 * 飞舞模块基类
 * Class FWModule
 */

class FWModule extends CWebModule implements IModule {

    /**
     * 安装时调用
     * @return bool
     */
    public function install()
    {
        return true;
    }

    /**
     * 卸载时调用
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }
}