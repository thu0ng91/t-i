<?php

//CMS应用参数配置
return array(
	'actionInfo'=>array(
		'saveSuccess'=>'信息添加成功！请继续添加。',
		'saveFail'=>'信息添加失败！请重新添加。',
		'updateSuccess'=>'信息更新成功！',
		'updateFail'=>'信息更新失败！请重新保存。',
		'deleteSuccess'=>'信息删除成功！',
		'deleteFail'=>'信息删除失败！',
	),
    'statusLabel' => array(
        '0' => '审核中',
        '-1' => '已删除',
        '1' => '已通过',
    ),
    'statusAction' => array(
        '0' => '不通过审核',
        '1' => '通过审核', 
    ),
    'moduleStatus' => array(
        '0' => "未安装",
        '1' => "已启用",
        '-1' => "已停用",
    ),
    'blockstatus'=>array(
    	'1'=>'不显示',
    	'2'=>'登陆前显示',
    	'3'=>'登录后显示',
    	'4'=>'都显示'
    ),
);
