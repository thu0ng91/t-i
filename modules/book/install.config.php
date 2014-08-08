<?php
/**
 * 扩展模块安装描述文件：必须
 */
return array(
	'name' => '小说连载模块', // 模块娶一个简单醒目的名字
	'author' => 'pizigou', // 模块作者
	'version' => '1.0.1', // 当前模块版本
	'fwversion' => '1.2.3', // 模块所需最低云阅版本
	'description' => '小说连载系统', // 模块详细说明
    'adminmenus' => array(
        'top' => array(
            'label' => '小说管理',
            'url' => 'book/admin/book/index',
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
                'label' => '小说静态配置',
                'url' => 'book/admin/setting/makeHtml',
            ),
            array(
                'label' => '小说缓存配置',
                'url' => 'book/admin/cacheconfig/index',
            ),
            array(
                'label' => '小说缓存清除',
                'url' => 'book/admin/cacheconfig/clear',
            ),
            array(
                'label' => '小说评论管理',
                'url' => 'book/admin/comment/index',
            ),
        )
    ),
);