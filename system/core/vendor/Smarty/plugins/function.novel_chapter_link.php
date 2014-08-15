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

    $pinyin = "";
    if(!empty($params['pinyin'])){
        $pinyin = $params['pinyin'];
    }

    if (!Yii::app()->hasModule("book")) return "";

//    $c = $smarty->tpl_vars['this']->value;

    $id = intval($params['id']);
    $bookid = intval($params['bookid']);


    $link = "book/chapter/index";

    $argv = array();

    $m = Yii::app()->settings->get("BookRewriteConfig", "book");
    if ($m) {
        if ($m->BookChapterDetailRule && $m->BookChapterDetailRuleVarDir > 0) { // 开启了 dir 变量
            $dir = floor($bookid / 1000);
            $argv['dir'] = $dir;
        }

        if ($m->BookChapterDetailRule && $m->BookChapterDetailRuleVarPinyin > 0 && $pinyin != "") { // 开启了 dir 变量

//            $book = Book::model()->findByPk($bookid);
//            if (!$book) return "";

            $argv['pinyin'] = $pinyin;
        }
    }

    unset($m);

    if (!isset($argv['pinyin'])) $argv['bookid'] = $bookid;

    $argv['id'] = $id;

//    array('bookid' => $bookid, 'id' => $id, 'dir' => $dir)
    return Yii::app()->createUrl($link, $argv);

}