<?php
/**
 * 主配置文件
 * 调用方式：Yii::app()->controller->module['xxx']
 */
return array(
    'admin' => array(
        'list_count' => 50, // 默认后台列表展示条数
    ),
    'front' => array(
        'seo' => array(
            '标题' => array(
                '登陆页' => "会员登陆_{站点名}",
                '注册页' => "欢迎注册成为本站会员_{站点名}",
            ),
        ),
    ),
);