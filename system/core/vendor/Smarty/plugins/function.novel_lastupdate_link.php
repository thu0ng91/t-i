<?php
/**
 * 获取最新更新地址
 *
 * Example:
 * {novel_search_link keyword="test"}
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_lastupdate_link($params, &$smarty){


    if (!Yii::app()->hasModule("book")) return "";

//    $keyword = "";
//    if (isset($params['keyword'])) {
//        $keyword = $params['keyword'];
//    }
    $link = "book/list/lastupdate";

//    if ($keyword == "") return Yii::app()->createUrl($link);

    $url = Yii::app()->createUrl($link);
    $url = H::wrapUrlWithMainDomain($url);
    return $url;

}