<?php
/**
 * 插件安装描述文件：必须
 */
return array(
	'name' => '测试插件', // 模块娶一个简单醒目的名字
	'author' => 'pizigou', // 模块作者
	'version' => '1.0.0', // 当前模块版本
	'fwversion' => '1.2.3', // 模块所需最低飞舞版本
	'description' => '测试插件', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '测试插件菜单',
            'url' => 'plugin/test/admin/index',
        ),
        'left' => array(
            array(
                'label' => '小说栏目管理',
                'url' => 'book/admin/category/index',
            ),
            array(
                'label' => '小说管理',
                'url' => 'book/admin/book/index',
            ),
            array(
                'label' => '小说伪静态配置',
                'url' => 'book/admin/setting/rewrite',
            ),
            array(
                'label' => '小说缓存配置',
                'url' => 'book/admin/cacheconfig/index',
            ),
            array(
                'label' => '小说缓存清除',
                'url' => 'book/admin/cacheconfig/clear',
            ),
        )
    ),
);