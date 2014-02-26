<?php
/**
 * 获取小说菜单插件
 * 
 * Example:
 *  {novel_menu name="top_menu"}
 *      <li><a href='{$item->url}'>{$item->title}</a></li>
 *  {/novel_menu}
 * 
 * @param array                    $params   parameters
 * @param string                   $content  contents of the block
 * @param Smarty_Internal_Template $template template object
 * @param boolean                  &$repeat  repeat flag
 * @return string
 * @author pizigou <pizigou@yeah.net>
 */
function smarty_block_novel_menu($params, $content, $template, &$repeat) {

    if (!Yii::app()->hasModule("book")) {
        $repeat = false;
        return;
    }

    if(empty($params['name'])){
//        throw new CException("'novel_book' 需要 name 参数");
        $name = "block_novel_menu";
    } else {
        $name = "block_novel_menu_" . $params['name'];
    }
//    $name = $params['name'];
    $itemVarName = 'item';
    $dataVarName = $name . "_data";
    $dataIndexVarName = $name . "_data_index";
    $dataCountVarName = $name . "_data_count";

    $itemPropVarName = "block";

    $itemProps = array(
        'index' =>  0,
        'iteration' => 1,
        'first' => true,
        'last' => false,
        'total' =>  0,
    );

    Yii::import("book.models.*");
    // 第一次取得数据集
    if (is_null($content)) {
        $list = Category::getMenus();

        $count = count($list);
        if (!$list) {
            $count = 0;
        } else {
//            $c = $template->tpl_vars['this']->value;
//            foreach ($list as $k => $v) {
//                $list[$k]['url'] = $c->createUrl('category/index', array('title' => $v->shorttitle));
//            }
        }

        $template->assign($dataVarName, $list);
        $template->assign($dataCountVarName, $count);
        $template->assign($dataIndexVarName, 0);

        $itemProps['total'] = $count;
        $template->assign($itemPropVarName, $itemProps);

    } else {
        echo $content;
    }

    $count = $template->getVariable($dataCountVarName)->value;
    $index = $template->getVariable($dataIndexVarName)->value;
    $itemProps =  $template->getVariable($itemPropVarName)->value;

    if ($count > 0 && $index < $count) {
        if (!$repeat) $repeat = true;
    } else {
        $repeat = false;
    }

    if ($repeat) { //assign variable only on open tag
        $list =  $template->getVariable($dataVarName)->value;

        if ($count < 1) {
            $template->assign($itemVarName, null);
            $repeat = false;
        } else {

            if ($index < $count) {
                $itemProps['index'] = $index;
                $itemProps['first'] = $index < 1 ? true : false;

                $template->assign($itemVarName, $list[$index]);
                $template->clearAssign($dataIndexVarName);
                $index++;
                $template->assign($dataIndexVarName, $index);

                $itemProps['iteration'] = $index;
                $itemProps['last'] = $index == $count ? true : false;
                $template->assign($itemPropVarName, $itemProps);

                $repeat = true;

            } else {
                $template->assign($itemVarName, null);
                $repeat = false;
            }
        }
    }

    if (!$repeat) {
        $template->clearAssign($itemVarName);
        $template->clearAssign($dataVarName);
        $template->clearAssign($dataIndexVarName);
        $template->clearAssign($dataCountVarName);
        $template->clearAssign($itemPropVarName);
    }
}
