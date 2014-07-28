<?php
/**
 * 扩展模块安装描述文件：必须
 */
return array(
	'name' => '区块管理', // 模块娶一个简单醒目的名字
	'author' => 'go123', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.2.3', // 模块所需最低云阅版本
	'description' => '小说区块管理', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '区块管理v1.0.0',
            'url' => 'block/admin/list/index',
        ),
        'left' => array(
            array(
                'label' => '区块管理',
                'url' => 'block/admin/list/index',
            ),
//            array(
//                'label' => '小说管理',
//                'url' => 'book/admin/book/index',
//            ),
//            array(
//                'label' => '小说伪静态配置',
//                'url' => 'book/admin/setting/rewrite',
//            ),
        )
    ),
);