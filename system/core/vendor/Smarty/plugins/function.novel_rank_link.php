<?php
/**
 * 排行榜地址
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
function smarty_function_novel_rank_link($params, &$smarty){


    if (!Yii::app()->hasModule("book")) return "";

//    $keyword = "";
//    if (isset($params['keyword'])) {
//        $keyword = $params['keyword'];
//    }
    $link = "book/list/rank";

//    if ($keyword == "") return Yii::app()->createUrl($link);

    return Yii::app()->createUrl($link);

}