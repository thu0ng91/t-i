<?php
/**
 * 飞舞模块基类
 * Class FWModule
 */

class FWModule extends CWebModule implements IModule {

    public function init()
    {
        parent::init();

        $this->setImport(array(
            $this->getId() . ".models.*",
            $this->getId() . ".components.*",
        ));
    }
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
     * @return boolean
     */
    public function upgrade()
    {
        return true;
    }
}