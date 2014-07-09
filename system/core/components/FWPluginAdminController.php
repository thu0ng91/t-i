<?php
/**
 * Class FWPluginAdminController
 */
class FWPluginAdminController extends FWAdminController
{
    private $_id = null;
    private $_pluginName = null;

    public function init()
    {
//        Yii::app()->extensionLoader->load();

        parent::init();

        $class = new ReflectionClass(get_class($this));
        Yii::app()->setViewPath(dirname($class->getFileName()).'/../views');

        $n = str_replace('Controller', '', $class->getName());
        $this->_id = strtolower($n);

        $this->_pluginName = basename(str_replace("controllers", "", dirname($class->getFileName())));
    }

    /**
     * 重新该方法，获取到真实的文件名作为ID， 而不是controllerMap中映射的名字
     * @return string
     */
    public function getId()
    {
        if ($this->_id) return $this->_id;
        $class = new ReflectionClass(get_class($this));
        $n = str_replace('Controller', '', $class->getName());
        $this->_id = strtolower($n);
        return $this->_id;
    }

    public function getPluginName()
    {
        if ($this->_pluginName) return $this->_pluginName;
        $class = new ReflectionClass(get_class($this));
//        $n = str_replace('Controller', '', $class->getName());
        $this->_pluginName  = basename(str_replace("controllers", "", dirname($class->getFileName())));
        return $this->_pluginName;
    }

    /**
     * 所有插件菜单都定位到插件管理上
     * @return array
     */
    protected function menus()
    {
        return array(
            'plugins',
        );
    }
}