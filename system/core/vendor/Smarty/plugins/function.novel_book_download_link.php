<?php
/**
 * 获取小说下载地址
 *
 * Example:
 * {novel_book_download_link id=1}
 *
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_book_download_link($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    if (!Yii::app()->hasModule("book")) return "";

//    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);
    $type = "";
    if (!empty($params['type'])) {
        $type = $params['type'];
    }

    switch ($type) {
        case "full":
            $link = 'book/detail/download';
            break;
        case 'page':
        default:
            $link = 'book/detail/downPage';
            break;
    }

    return Yii::app()->createUrl($link, array('id' => $id));

}