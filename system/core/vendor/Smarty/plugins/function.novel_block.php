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

    $blockFile = FW_ROOT_PATH . DS . "runtime" . DS . "blocks" . DS . "block_" . $id . ".tpl";
    if (!file_exists($blockFile)) return "";
    $blockConfigFile = FW_ROOT_PATH . DS . "runtime" . DS . "blocks" . DS . "block_" . $id . ".conf";

    $cacheTime = null;
    $blockStatus = 4;
    if (file_exists($blockFile)) {
        $blockConfig = file_get_contents($blockConfigFile);
        $blockConfig = json_decode($blockConfig, true);

        $cacheTime = $blockConfig['cachetime'];

        $blockStatus = intval($blockConfig['status']);
    }

    switch ($blockStatus) {
        case 1:
            return "";
            break;
        case 2:
            if (!Yii::app()->user->isGuest) return "";
            break;
        case 3:
            if (Yii::app()->user->isGuest) return "";
            break;
        default:
            break;
    }

    $r = $smarty->getSubTemplate($blockFile, null, null, Smarty::CACHING_LIFETIME_SAVED, $cacheTime, null, null);

    return $r;

}