<?php
if (defined('YII_DEBUG')) {
    error_reporting(E_ALL&~E_DEPRECATED&~E_NOTICE);
} else {
    error_reporting(0);
}
defined('DS') or define('DS',DIRECTORY_SEPARATOR);

defined('FW_ROOT_PATH') or define('FW_ROOT_PATH', dirname(__FILE__));
defined('FW_MODULE_BASE_PATH') or define('FW_MODULE_BASE_PATH', FW_ROOT_PATH . DS . "modules");
defined('FW_PLUGIN_BASE_PATH') or define('FW_PLUGIN_BASE_PATH', FW_ROOT_PATH . DS . "plugins");

defined('BASE_THEME_DIR') or define('BASE_THEME_DIR',"themes");
defined('BASE_THEME_PATH') or define('BASE_THEME_PATH', FW_ROOT_PATH. DS . BASE_THEME_DIR);

defined('FW_UPLOAD_DIR') or define('FW_UPLOAD_DIR', 'uploads');
defined('FW_TXT_DIR') or define('FW_TXT_DIR', 'txt');

require_once('version.php');

$yii=dirname(__FILE__).'/system/framework/yii.php';
$globals=dirname(__FILE__).'/system/core/globals.php';

//defined('YII_DEBUG') or define('YII_DEBUG',true);

defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once($yii);

$app=Yii::createWebApplication($config);
require_once($globals);
$app->run();
