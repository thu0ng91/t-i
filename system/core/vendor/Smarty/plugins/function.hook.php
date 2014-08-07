<?php
/**
 * 放置钩子
 * Example:
 * {hook name="onXXX"}
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_hook($params, &$smarty){
    if(empty($params['name'])){
        return "";
    }

    $r = "";

    FWHook::run($params['name']);
//    if (!Yii::app()->hasModule("block")) return "";

//    $c = $smarty->tpl_vars['this']->value;

//    Yii::import("block.models.*");
//    $id = intval($params['id']);
//
//    $blockFile = FW_ROOT_PATH . DS . "runtime" . DS . "blocks" . DS . "block_" . $id . ".tpl";
//    if (!file_exists($blockFile)) return "";
//    $blockConfigFile = FW_ROOT_PATH . DS . "runtime" . DS . "blocks" . DS . "block_" . $id . ".conf";
//
//    $cacheTime = null;
//    $blockStatus = 4;
//    if (file_exists($blockFile)) {
//        if (file_exists($blockConfigFile)) {
//            $blockConfig = file_get_contents($blockConfigFile);
//            $blockConfig = json_decode($blockConfig, true);
//        } else {
//            $blockConfig = array(
//                'cachetime' => 3600,
//                'status' => 1,
//            );
//        }
//
//        $cacheTime = $blockConfig['cachetime'];
//
//        $blockStatus = intval($blockConfig['status']);
//    }
//
//    switch ($blockStatus) {
//        case 1:
//            return "";
//            break;
//        case 2:
//            if (!Yii::app()->user->isGuest) return "";
//            break;
//        case 3:
//            if (Yii::app()->user->isGuest) return "";
//            break;
//        default:
//            break;
//    }
//
//    $cacheDir = $smarty->cache_dir;
//    $cacheFile = $cacheDir . "block." . $id . ".cache";
//
//    $isReCache = true;
//
//    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
//        $isReCache = false;
//    }
//
//    if ($isReCache) {
//        $r = $smarty->fetch($blockFile);
//        file_put_contents($cacheFile, $r);
//    } else {
//        $r = file_get_contents($cacheFile);
//    }

    return $r;

}