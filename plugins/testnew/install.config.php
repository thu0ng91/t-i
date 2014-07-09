<?php
/**
 * 插件安装描述文件：必须
 */
return array(
	'name' => '测试插件2', // 模块娶一个简单醒目的名字
	'author' => 'pizigou', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.2.4', // 模块所需最低飞舞版本
	'description' => '测试插件2', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '测试插件菜单2',
            'url' => 'plugin/testnew/admin/index',
        ),
        'left' => array(
            array(
                'label' => '测试菜单一',
                'url' => 'plugin/testnew/admin/index',
            ),
            array(
                'label' => '测试菜单二',
                'url' => 'plugin/testnew/admin/tip',
            ),
        )
    ),
);