<?php
/**
 * 飞舞模块基类
 * Class FWModule
 */

class FWModule extends CWebModule implements IModule,ArrayAccess {

    private $_fwModuleConfig = array();

    public function init()
    {
        parent::init();

        // 装载模块配置
        $moduleConfigFile = FW_MODULE_BASE_PATH . DS . $this->getId() . DS . "config" . DS . "main.php";
        if (is_file($moduleConfigFile)) {
            $config = include_once $moduleConfigFile;
            $this->loadConfig($config);
        }

        $this->setImport(array(
            $this->getId() . ".models.*",
            $this->getId() . ".components.*",
        ));


    }

    public function offsetSet($offset, $value)
    {
        $this->_fwModuleConfig[$offset] = $value;
    }

    public function offsetExists($offset)
    {
        return isset($this->_fwModuleConfig[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->_fwModuleConfig[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->_fwModuleConfig[$offset]) ? $this->_fwModuleConfig[$offset] : null;
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

    /**
     * @param $config
     */
    protected function loadConfig($config)
    {
        if (is_array($config)) {
            $this->_fwModuleConfig = CMap::mergeArray($this->_fwModuleConfig, $config);
        }
    }
}