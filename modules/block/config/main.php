<?php
/**
 * 主配置文件
 * 调用方式：Yii::app()->controller->module['xxx']
 */
return array(
    'admin' => array(
        'list_count' => 50, // 默认后台列表展示条数
    ),
    'blocktype'=>array(
    	'novel'=>'小说区块',
    	//'user'=>'用户区块',
    	//'comment'=>'评论区块',
    	'custom'=>'自定义区块'
    ),
    'blockstatus'=>array(
    	'1'=>'不显示',
    	'2'=>'登陆前显示',
    	'3'=>'登录后显示',
    	'4'=>'都显示'
    ),
    'sorttype'=>array(
    	'1'=>'总点击',
    	'2'=>'月点击',
    	'3'=>'周点击',
    	'4'=>'日点击',
    	'5'=>'总推荐',
    	'6'=>'月推荐',
    	'7'=>'周推荐',
    	'8'=>'日推荐',
    	'9'=>'最新入库',
    	'10'=>'收藏数',
    	'11'=>'文章字数',
    	'12'=>'最新更新',
    	'13'=>'本站推荐',
    	'14'=>'全本小说'
    ),
    'order'=>array(
    	'1'=>'由小到大',
    	'2'=>'由大到小',
    ),
    'templatetags'=>array(
    	'{novel_book_link id=$item->id}'=>'小说链接',
    	'{$item->coverImageUrl}'=>'小说封面',
    	'{$item->category->title}'=>'分类名称',
    	'{$item->id}'=>'小说id',
    	'{$item->title}'=>'小说标题',
    	'{$item->author}'=>'小说作者',
    	'{$item->authorid}'=>'作者id',
    	'{$item->cid}'=>'分类ID',
    	'{$item->category->url}'=>'分类链接',
    	'{$item->flag}'=>'全本状态',
    	'{$item->keywords}'=>'关键词',
    	'{$item->summary}'=>'简介',
    	'{$item->pinyin}'=>'小说拼音',
    	'{$item->initial}'=>'首字母',
    	'{$item->recommendlevel}'=>'推荐等级',
    	'{$item->favoritenum}'=>'收藏数',
    	'{$item->wordcount}'=>'字数',
    	'{$item->lastchapterid}'=>'最新章节ID',
    	'{$item->lastchaptertitle}'=>'最新章节标题',
    	'{$item->lastchaptertime}'=>'最后更新时间',
    	'{$item->alllikenum}'=>'推荐总数',
    	'{$item->monthlikenum}'=>'月推荐数',
    	'{$item->weeklikenum}'=>'周推荐数',
    	'{$item->daylikenum}'=>'日推荐数',
    	'{$item->allclicks}'=>'总点击数',
    	'{$item->monthclicks}'=>'月点击数',
    	'{$item->weekclicks}'=>'周点击数',
    	'{$item->dayclicks}'=>'日点击数',
    	'{$item->hascover}'=>'封面状态',
    	'{$item->createtime}'=>'入库时间',
    ),
    'front' => array(
    ),
);