<?php
/**
 * 插件安装描述文件：必须
 */
return array(
	'name' => '百度分享', // 模块娶一个简单醒目的名字
	'author' => 'go123', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.0.0', // 模块所需最低云阅版本
	'description' => '百度分享插件', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '百度分享',
            'url' => 'plugin/baidushare/admin/index',
        ),
        'left' => array(
            array(
                'label' => '百度分享设置',
                'url' => 'plugin/baidushare/admin/index',
            ),
        )
    ),
);