<?php if ( ! defined('YII_PATH')) exit('No direct script access allowed');
/**
 * 插件加载组件
 * Class PluginLoader
 */
class PluginLoader extends CApplicationComponent{

    protected $_loaded=array();
    
    protected $_list=array();
    
    public function init()
    {
        parent::init();


//        $schema = Yii::app()->db->schema;
//        $tables = $schema->findTableNames();
//
//        if (!in_array('plugin', $tables)) {
//            return;
//        }
        // 如果访问的是前台页面，并且还未安装系统本身，则不需load 插件，否则插件表不存在会导致错误
        if (false === Yii::getPathOfAlias('backend') && !H::checkIsInstall()) return;

        $ext=$this->getPluginClasses('plugin');
        $list=array();

        foreach($ext AS $alias)
        {
            if(!is_string($alias)||strlen($alias)<1)
                continue;
            
            $class=Yii::createComponent(array('class'=>$alias));
            if($class instanceof FWPlugin)
            {
                $priority=(int)$class->priority;
                
                while(isset($list[$priority]))
                    $priority++;
                    
                $list[$priority]=$class;
            }
        }

        $this->_list=$list;
        
        foreach($this->_list AS $class)
        {
            if(!$class->isInitialized)
                $class->init();
        }
    }
    
    public function load()
    {
        if(!Yii::app()->getController())
            return;

        foreach($this->_list AS $class)
            $class->run();  
    }
    
    public function getPluginClasses($extPathAlias)
    {
        if(isset($this->_loaded[$extPathAlias]))
            return $this->_loaded[$extPathAlias];
        
        $ext=array();
        // 加载所有插件的hook
        $plugins = Plugins::model()->findAll("status=:status", array(
            ':status' => Yii::app()->params['status']['ischecked'],
        ));

        foreach ($plugins as $m) {
//            include_once FW_PLUGIN_BASE_PATH . DS . $m->name . DS . "hook.php";
            $m = $m->name;
            $initClassName=ControllerHelper::toCamelCase($m,false);
            if (is_dir(FW_PLUGIN_BASE_PATH . DS . $m) && is_file(FW_PLUGIN_BASE_PATH . DS . $m . DS . $initClassName . "Plugin.php")) {
                $ext[] = $extPathAlias . "." . $m .'.'.$initClassName.'Plugin';
            }
        }
//        if($handle = opendir(Yii::getPathOfAlias($extPathAlias)))
//        {
//            $stripOut=array('.','..','.htaccess','index.html');
//            while(false !== ($entry = readdir($handle)))
//            {
//                $dirPathAlias=$extPathAlias.'.'.$entry;
//                $initClassName=ControllerHelper::toCamelCase($entry,false);
//
//                if(!in_array($entry,$stripOut) && is_dir(Yii::getPathOfAlias($dirPathAlias)) && is_file(Yii::getPathOfAlias($dirPathAlias.'.'.$initClassName.'Plugin').'.php'))
//                {
//                    $ext[]=$dirPathAlias.'.'.$initClassName.'Plugin';
//                }
//            }
//            closedir($handle);
//        }
        return $this->_loaded[$extPathAlias] = $ext;
    }
    
}