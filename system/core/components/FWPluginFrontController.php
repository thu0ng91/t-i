<?php
/**
 * Class FWPluginFrontController
 */
class FWPluginFrontController extends FWFrontController
{
    private $_id = null;

    public function init()
    {
//        Yii::app()->extensionLoader->load();

        parent::init();

        $class = new ReflectionClass(get_class($this));
        Yii::app()->setViewPath(dirname($class->getFileName()).'/../views');
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
}