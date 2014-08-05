<?php
/**
 * 主配置文件
 * 调用方式：Yii::app()->controller->module['xxx']
 */
return array(
    'admin' => array(
        'list_count' => 50, // 默认后台列表展示条数
    ),
    'status'=>array(
    	'1'=>'不显示',
    	'2'=>'登陆前显示',
    	'3'=>'登录后显示',
    	'4'=>'都显示'
    ),
    'front' => array(
    ),
);