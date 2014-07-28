<?php if ( ! defined('YII_PATH')) exit('No direct script access allowed');

/**
 * 云阅插件核心类
 * Class FWPlugin
 */
class FWPlugin extends CApplicationComponent{
    
    private $maxPriority=100;
    
    private $minPriority=-100;
    
    protected $_priority=0;
    
    public function init()
    {
        parent::init();

        Yii::app()->attachEventHandler('onBeginRequest', array($this,'createController'));

        $class = new ReflectionClass(get_class($this));
        $m = basename($class->getFileName(), "Plugin.php");
        $m = strtolower($m);
        $class = null;

        // import path alias
        Yii::import("plugin." . $m . ".controllers.*");
        Yii::import("plugin." . $m . ".models.*");


        /**
         * 装载钩子
         */
        $hook = $this->hooks();

        foreach ($hook as $n => $v) {
            foreach ($v as $p => $v1) {
                FWHook::install($n, $p, $m, strtolower($v[0]), $v[1]);
            }
        }
    }
    
    public function run()
    {
    }
    
    public function getModule()
    {
        return Yii::app()->getController() ? Yii::app()->getController()->getModule() : null;
    }

    public function getController()
    {
        return Yii::app()->getController();
    }

    public function getPriority()
    {
        return (int)$this->_priority;
    }
    
    public function setPriority($int)
    {
        if($int < $this->minPriority || $int > $this->maxPriority)
            throw new CHttpException(500,Yii::t('app', 'The allowed priority limit is between {min} and {max}!',array(
                '{min}'=>$this->minPriority,'{max}'=>$this->maxPriority,
            )));
        $this->_priority=$int;
    }

    /**
     * 安装
     * @return boolean
     */
    public function install()
    {
        return true;
    }

    /**
     * 升级
     * @return boolean
     */
    public function upgrade()
    {
        return true;
    }

    /**
     * 卸载
     * @return boolean
     */
    public function uninstall()
    {
        return true;
    }

    /**
     * 钩子配置
     * return array(
     *  'hook namespace' => array(
     *      'hook point' => array('hook controller', 'hook method'),
     *  ),
     * ),
     */
    public function hooks()
    {
        return array();
    }

    public function createController($event)
    {
        $map = Yii::app()->controllerMap;

        $class = new ReflectionClass(get_class($this));
        $dir = dirname($class->getFileName()) . DS  . 'controllers';
        $m = basename($class->getFileName(), "Plugin.php");

        $m = strtolower($m);

        $new = array();

        if($handle = opendir($dir))
        {
            $stripOut=array('.','..','.htaccess','index.html');
            while(false !== ($entry = readdir($handle)))
            {
                $entry = basename($entry, ".php");
//                echo $entry;
                $dirPathAlias = 'plugin.'. $m;
                $c = str_replace('Controller', '', $entry);
//                $initClassName = ControllerHelper::toCamelCase($entry,false);

                $c = strtolower($c);

                if(!in_array($entry,$stripOut))
                {
                    $new['plugin'.$m . $c] = array( 'class' => $dirPathAlias .'.controllers.' . $entry);
                }
            }
            closedir($handle);
        }

        Yii::app()->controllerMap = CMap::mergeArray($map,$new);
//        var_dump(Yii::app()->controllerMap);exit;
    }
}