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

    $pinyin = "";
    if(!empty($params['pinyin'])){
        $pinyin = $params['pinyin'];
    }

    if ($pinyin != "") {
        $rootDomain = H::getRootDomain();
        $m = Yii::app()->settings->get("SystemBaseConfig");
        if ($m && $m->SiteIsWildcardDomain > 0) {
            return "http://" . $pinyin . "." . $rootDomain;
        }
    }

    $argv = array();

    $m = Yii::app()->settings->get("BookRewriteConfig", "book");
    if ($m) {
        if ($m->BookIndexRule && $m->BookIndexRuleIsUseVarDir > 0) { // 开启了 dir 变量
            $dir = floor($id / 1000);
            $argv['dir'] = $dir;
        }

        if ($m->BookIndexRule && $m->BookIndexRuleIsUseVarPinyin > 0 && $pinyin != "") { // 开启了 dir 变量

//            $book = Book::model()->findByPk($id);
//            if (!$book) return "";

            $argv['pinyin'] = $pinyin;
        }
    }

    unset($m);

    if (!isset($argv['pinyin'])) $argv['id'] = $id;

    return Yii::app()->createUrl($link, $argv);

}