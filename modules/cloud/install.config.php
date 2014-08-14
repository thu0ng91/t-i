<?php
/**
 * 扩展模块安装描述文件：必须
 */
return array(
	'name' => '云中心', // 模块娶一个简单醒目的名字
	'author' => 'go123', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.0.0', // 模块所需最低云阅版本
	'description' => '云中心', // 模块详细说明
    'iscore' => true,
    'adminmenus' => array(
        'top' => array(
            'label' => '云中心',
            'url' => 'cloud/admin/list/index',
        ),
        'left' => array(
        	array(
                'label' => '云中心首页',
                'url' => 'cloud/admin/list/index',
            ),
            array(
                'label' => '模板中心',
                'url' => 'cloud/admin/list/temp',
            ),
            array(
                'label' => '插件中心',
                'url' => 'cloud/admin/list/plugin',
            ),
            array(
                'label' => '帮助中心',
                'url' => 'cloud/admin/list/help',
            ),
            array(
                'label' => '云广告',
                'url' => 'cloud/admin/list/ad',
            ),
            array(
                'label' => '云服务器',
                'url' => 'cloud/admin/list/vps',
            ),
        )
    ),
);