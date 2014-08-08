<?php
/**
 * Class TestPlugin
 */
class TestPlugin extends FWPlugin {

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

    /**
     * 升级时调用
     * @return bool
     */
    public function upgrade()
    {
        return true;
    }

    /**
     * 注册插件挂载系统的钩子
     * @return array
     */
    public function hooks()
    {
        return array(
            'onSiteIndex' => array('hook', 'onSiteIndex'),
        );
    }
}