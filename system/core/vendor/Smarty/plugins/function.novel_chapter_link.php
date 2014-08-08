<?php
/**
 * 取得章节地址
 *
 * Example:
 * {novel_chapter_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_chapter_link($params, &$smarty){
    if(empty($params['bookid'])){
        return "";
    }
    if(empty($params['id'])){
        return "";
    }

    if (!Yii::app()->hasModule("book")) return "";

//    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);
    $bookid = intval($params['bookid']);
    $dir = floor($bookid / 1000);

    $link = "book/chapter/index";

    return Yii::app()->createUrl($link, array('bookid' => $bookid, 'id' => $id, 'dir' => $dir));

}