<?php
/**
 * 获取分类地址
 *
 * Example:
 * {novel_category_link id="1" title=''}
 *
 * @param array $params
 * @param Smarty $smarty
 * @return string
 *
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_function_novel_category_link($params, &$smarty){
    if(empty($params['id'])){

//        return "";
    } else {
//        trigger_error("novel_category_link [id] param have been deprecated by this version, pls use [title] param!", E_USER_WARNING);

    }

    if (!Yii::app()->hasModule("book")) return "";

//    $c = $smarty->tpl_vars['this']->value;

//    return "";


    $shorttitle = '';

    if (isset($param['shorttitle'])) {
//        $criteria->compare("title", $param['title']);

        $shorttitle = $param['shorttitle'];
    } elseif (isset($param['title'])) {
        $criteria = new CDbCriteria();
        $id = intval($params['id']);
        $criteria->compare("id", $id);
        $m = Category::model()->find($criteria);
        if (!$m) return "";

        $shorttitle = $m->shorttitle;
    }

    return Yii::app()->createUrl('book/list/index', array('title' => $shorttitle));

}