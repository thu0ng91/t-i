<?php
/**
 * 根据区块编号
 * Example:
 * {novel_block id=1}
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_block($params, &$smarty){
    if(empty($params['id'])){
        return "";
    }

    if (!Yii::app()->hasModule("block")) return "";

//    $c = $smarty->tpl_vars['this']->value;

    Yii::import("block.models.*");
    $id = intval($params['id']);

    // 从数据库中

    $blockFile = FW_ROOT_PATH . DS . "runtime" . DS . "blocks" . DS . "block_" . $id . ".tpl";

    if (!file_exists($blockFile)) return "";

    $r = $smarty->getSubTemplate($blockFile, null, null, null, null, null, null);

    return $r;

}