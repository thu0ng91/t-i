<?php
/**
 * 取得小说地址
 *
 * Example:
 * {novel_book_link id=1 type="index|info"}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_book_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    if (!Yii::app()->hasModule("book")) return "";

    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);
    $type = "";
    if (!empty($params['type'])) {
        $type = $params['type'];
    }

    switch ($type) {
        case "info":
            $link = 'book/detail/info';
            break;
        case "index":
        default:
            $link = 'book/detail/index';
            break;
    }

    $dir = floor($id / 1000);
    return Yii::app()->createUrl($link, array('id' => $id, 'dir' => $dir));

}