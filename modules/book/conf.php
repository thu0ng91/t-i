<?php
/**
 * 扩展模块描述文件：必须
 * 本模块未演示扩展模块
 */
return array(
	'name' => '小说连载模块', // 模块娶一个简单醒目的名字
	'author' => 'pizigou', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.2.3', // 模块所需最低飞舞版本
	'description' => '小说连载系统', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '小说管理',
            'url' => 'book/admin/index',
        ),
        'left' => array(
            array(
                'label' => '小说管理',
                'url' => 'book/admin/index',
            ),
        )
    ),
);