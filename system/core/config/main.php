<?php
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


$webUrl = pathinfo($_SERVER['SCRIPT_NAME']);
$webUrl = str_replace('\\', '/', $webUrl['dirname']);
$webUrl = rtrim($webUrl, '/');
$basePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'..';

Yii::setPathOfAlias('bootstrap', $basePath . '/extensions/bootstrap');
Yii::setPathOfAlias('fwmodule', $basePath . '/../../modules/');
Yii::setPathOfAlias('plugin', FW_PLUGIN_BASE_PATH);

return array(
	'basePath'=> $basePath,
	'name'=> '云阅小说系统',
	'language'=>'zh_cn',
	// preloading 'log' component
	'preload'=>array('log', 'pluginLoader'),
	'viewPath'=>'.',
    'runtimePath'=> $basePath .'/../../runtime/front',
    'modulePath'=> $basePath .'/../../modules',
	// autoloading model and component classes
	'import'=>array(
    'application.models.*',
    'application.components.*',
    'application.behaviors.*',
//    'application.extensions.gallerymanager.*',
//    'application.extensions.gallerymanager.models.*',
    'application.extensions.image.*',
	),

    'theme' => 'paitxt',

    'behaviors' => array(
        'app' => 'application.behaviors.FrontAppBehavior',
    ),
	
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
//            'generatorPaths'=>array(
//              'bootstrap.gii',
//            ),
			'password'=>'123456',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			//'ipFilters'=>array('127.0.0.1','::1'),
		),
//        'test',
//        'fw',
    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
            'stateKeyPrefix' => 'free55user',
			'allowAutoLogin' => true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat' => 'path',
			'urlSuffix' => '.html',
			'showScriptName' => false,
			'rules' => require_once dirname(__FILE__) . "/url-rules.php",
		),
        /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/db_magnet.db',
			'tablePrefix'=>'mt_',
		),
         * 
         */
		// uncomment the following to use a MySQL database
        // 支持读写分离
		'db'=> require_once $basePath . '/../../runtime/front/db.config.php',
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'/site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
                	'class'=>'CFileLogRoute', 
					'levels'=>'error,warning,trace,info',
                    'categories' => 'application.*,system.*',
//           	 	array(
//                    'class' => 'CWebLogRoute',
//					  'levels'=>'trace,info,error, warning',
                ),
//                array(
//                    'class'=>'CProfileLogRoute',
//                    'levels'=>'profile',
//                    //'showInFireBug' => true,
//                    'categories'=>'system.db.CDbCommand.query',
////                    'logFile'=> 'sql.log'
//                ),
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'trace,log',
                    'categories' => 'system.db.CDbCommand',
                    'logFile' => 'db.log',
                ),
			),
		),
		'image'=>array(
					'class'=>'application.extensions.image.CImageComponent',
					// GD or ImageMagick
					'driver'=>'GD',
					// ImageMagick setup path
					//'params'=>array('directory'=>'D:/Program Files/ImageMagick-6.4.8-Q16'),
				),	
//		'yexcel' => array(
//			'class' => 'ext.yexcel.Yexcel'
//		),

        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),

        'themeManager' => array(
            'basePath' => BASE_THEME_PATH . DS . 'front',
            'baseUrl' => $webUrl . '/' . BASE_THEME_DIR . '/front',
            'themeClass' => 'application.components.FWTheme',
        ),

        'viewRenderer' => array(
            'class'=>'application.extensions.yiiext.renderers.smarty.ESmartyViewRenderer',
            'fileExtension' => '.tpl',
            'config' => array(
                'force_compile' => false,
            )
        ),

        'cache'=>array(
            'class'=>'system.caching.CFileCache',
            'cachePath' => $basePath . '/../../runtime/front/cache',
            'hashKey' => true,
            'keyPrefix' => 'free55_cache_',
            'directoryLevel' => 2,
        ),

        'settings'=>array(
            'class'                 => 'application.extensions.onetwist.CmsSettings',
            'cacheComponentId'  => 'cache',
            'cacheId'           => 'global_website_settings',
            // default 0, never expire
//            'cacheTime'         => 84000,
            'tableName'     => '{{settings}}',
            'dbComponentId'     => 'db',
            'createTable'       => true,
            'dbEngine'      => 'MyISAM',
        ),
        'pluginLoader' => array(
            'class' => 'PluginLoader',
        ),
	),
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__) . '/params.php'),
	//'onBeginRequest'=>create_function('$event', 'return ob_start("ob_gzhandler");'),
	//'onEndRequest'=>create_function('$event', 'return ob_end_flush();'),
);