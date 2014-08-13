<?php
/**
 * 生成链接地址
 *
 * Example:
 * {novel_link url='' params=[]}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_link($params, &$smarty){
    if(empty($params['url'])){
        return "";
    }

    $url = $params['url'];
    unset($params['url']);
	

	$argv = array();

	if (isset($params['params']) && is_array($params['params'])) {
		$argv = $params['params'];
	}

//    if (!Yii::app()->hasModule("book")) return "";

//    $c = $smarty->tpl_vars['this']->value;

//    $id = intval($params['id']);
//    $bookid = intval($params['bookid']);
//
//    $link = "book/chapter/index";

    return Yii::app()->createUrl($url, $argv);

}