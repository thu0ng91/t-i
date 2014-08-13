<?php
/**
 * Smarty Internal Plugin Compile Foreach
 *
 * Compiles the {foreach} {foreachelse} {/foreach} tags
 *
 * @package Smarty
 * @subpackage Compiler
 * @author Uwe Tews
 */

/**
 * Smarty Internal Plugin Compile Foreach Class
 *
 * @package Smarty
 * @subpackage Compiler
 */
class Smarty_Internal_Compile_Novel_book extends Smarty_Internal_Book_Compilebase
{

//    private  $bookData = array();

    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
//    public $required_attributes = array('from', 'item');
    public $required_attributes = array();
    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $optional_attributes = array('name', 'cid', 'limit', 'order', 'recommend', 'id', 'where');
    /**
     * Attribute definition: Overwrites base class.
     *
     * @var array
     * @see Smarty_Internal_CompileBase
     */
    public $shorttag_order = array();
//    public $shorttag_order = array('from','item','key','name');

    /**
     * Compiles code for the {foreach} tag
     *
     * @param  array  $args      array with attributes from parser
     * @param  object $compiler  compiler object
     * @param  array  $parameter array with compilation parameter
     * @return string compiled code
     */
    public function compile($args, $compiler, $parameter)
    {
        $tpl = $compiler->template;
        // check and get attributes
        $_attr = $this->getAttributes($compiler, $args);

//        $from = $_attr['from'];
//        $item = $_attr['item'];
//        if (!strncmp("\$_smarty_tpl->tpl_vars[$item]", $from, strlen($item) + 24)) {
//            $compiler->trigger_template_error("item variable {$item} may not be the same variable as at 'from'", $compiler->lex->taglineno);
//        }

//        if (isset($_attr['key'])) {
//            $key = $_attr['key'];
//        } else {
//            $key = null;
//        }

//        $this->openTag($compiler, 'foreach', array('foreach', $compiler->nocache, $item, $key));
        $this->openTag($compiler, 'novel_book');
        // maybe nocache because of nocache variables
        $compiler->nocache = $compiler->nocache | $compiler->tag_nocache;

//        if (isset($_attr['name'])) {
//            $name = $_attr['name'];
//            $has_name = true;
//            $SmartyVarName = '$smarty.foreach.' . trim($name, '\'"') . '.';
//        } else {
//            $name = null;
//            $has_name = false;
//        }
//        $ItemVarName = '$' . trim($item, '\'"') . '@';
        // evaluates which Smarty variables and properties have to be computed

//        $has_name = true;
//        $SmartyVarName = '$item';
//        if ($has_name) {
//            $usesSmartyFirst = strpos($tpl->source->content, $SmartyVarName . 'first') !== false;
//            $usesSmartyLast = strpos($tpl->source->content, $SmartyVarName . 'last') !== false;
//            $usesSmartyIndex = strpos($tpl->source->content, $SmartyVarName . 'index') !== false;
//            $usesSmartyIteration = strpos($tpl->source->content, $SmartyVarName . 'iteration') !== false;
//            $usesSmartyShow = strpos($tpl->source->content, $SmartyVarName . 'show') !== false;
//            $usesSmartyTotal = strpos($tpl->source->content, $SmartyVarName . 'total') !== false;
//        } else {
//            $usesSmartyFirst = false;
//            $usesSmartyLast = false;
//            $usesSmartyTotal = false;
//            $usesSmartyShow = false;
//        }

//        $ItemVarName = '$item';
//        $usesPropFirst = $usesSmartyFirst || strpos($tpl->source->content, $ItemVarName . 'first') !== false;
//        $usesPropLast = $usesSmartyLast || strpos($tpl->source->content, $ItemVarName . 'last') !== false;
//        $usesPropIndex = $usesPropFirst || strpos($tpl->source->content, $ItemVarName . 'index') !== false;
//        $usesPropIteration = $usesPropLast || strpos($tpl->source->content, $ItemVarName . 'iteration') !== false;
//        $usesPropShow = strpos($tpl->source->content, $ItemVarName . 'show') !== false;
//        $usesPropTotal = $usesSmartyTotal || $usesSmartyShow || $usesPropShow || $usesPropLast || strpos($tpl->source->content, $ItemVarName . 'total') !== false;
        // generate output code


        $item = "'item'";
        $block = "'block'";
        $output = "<?php ";
        $output .= "require_once SMARTY_SYSPLUGINS_DIR . 'core.novel_block.php';";
        $output .= " \$_smarty_tpl->tpl_vars[$block] = new Smarty_Variable; \$_smarty_tpl->tpl_vars[$block]->_loop = false;\n";
        $output .= " \$_smarty_tpl->tpl_vars[$item] = new Smarty_Variable; \$_smarty_tpl->tpl_vars[$item]->_loop = false;\n";

        $varParams = $this->custom_var_export($_attr);
        $output .= " \$_data = _fw_get_book_list(" . $varParams . ");\n";
//        if ($key != null) {
//            $output .= " \$_smarty_tpl->tpl_vars[$key] = new Smarty_Variable;\n";
//        }
//        $output .= " \$_from = $from; if (!is_array(\$_from) && !is_object(\$_from)) { settype(\$_from, 'array');}\n";
//        if ($usesPropTotal) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->total= \$_smarty_tpl->_count(\$_from);\n";
//        }
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['total']= \$_smarty_tpl->_count(\$_data);\n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['index'] = -1; \n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['iteration'] = 0; \n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['first'] = true; \n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['last'] = false; \n";
//        if ($usesPropIteration) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->iteration=0;\n";
//        }
//        if ($usesPropIndex) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->index=-1;\n";
//        }
//        if ($usesPropShow) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->show = (\$_smarty_tpl->tpl_vars[$item]->total > 0);\n";
//        }
//        if ($has_name) {
//            if ($usesSmartyTotal) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['total'] = \$_smarty_tpl->tpl_vars[$item]->total;\n";
//            }
//            if ($usesSmartyIteration) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['iteration']=0;\n";
//            }
//            if ($usesSmartyIndex) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['index']=-1;\n";
//            }
//            if ($usesSmartyShow) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['show']=(\$_smarty_tpl->tpl_vars[$item]->total > 0);\n";
//            }
//        }
        $output .= "foreach (\$_data as \$_smarty_tpl->tpl_vars[$item]->key => \$_smarty_tpl->tpl_vars[$item]->value) {\n\$_smarty_tpl->tpl_vars[$item]->_loop = true;\n";
//        if ($key != null) {
//            $output .= " \$_smarty_tpl->tpl_vars[$key]->value = \$_smarty_tpl->tpl_vars[$item]->key;\n";
//        }
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['iteration']++;\n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['index']++;\n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['first'] = \$_smarty_tpl->tpl_vars[$block]->value['index'] === 0;\n";
        $output .= " \$_smarty_tpl->tpl_vars[$block]->value['last'] = \$_smarty_tpl->tpl_vars[$block]->value['iteration'] === \$_smarty_tpl->tpl_vars[$block]->value['total'];\n";
//        if ($usesPropIteration) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->iteration++;\n";
//        }
//        if ($usesPropIndex) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->index++;\n";
//        }
//        if ($usesPropFirst) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->first = \$_smarty_tpl->tpl_vars[$item]->index === 0;\n";
//        }
//        if ($usesPropLast) {
//            $output .= " \$_smarty_tpl->tpl_vars[$item]->last = \$_smarty_tpl->tpl_vars[$item]->iteration === \$_smarty_tpl->tpl_vars[$item]->total;\n";
//        }
//        if ($has_name) {
//            if ($usesSmartyFirst) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['first'] = \$_smarty_tpl->tpl_vars[$item]->first;\n";
//            }
//            if ($usesSmartyIteration) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['iteration']++;\n";
//            }
//            if ($usesSmartyIndex) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['index']++;\n";
//            }
//            if ($usesSmartyLast) {
//                $output .= " \$_smarty_tpl->tpl_vars['smarty']->value['foreach'][$name]['last'] = \$_smarty_tpl->tpl_vars[$item]->last;\n";
//            }
//        }
        $output .= "?>";

        return $output;
    }
}



/**
 * Smarty Internal Plugin Compile Foreachclose Class
 *
 * @package Smarty
 * @subpackage Compiler
 */
class Smarty_Internal_Compile_Novel_bookclose extends Smarty_Internal_CompileBase
{
    /**
     * Compiles code for the {/foreach} tag
     *
     * @param  array  $args      array with attributes from parser
     * @param  object $compiler  compiler object
     * @param  array  $parameter array with compilation parameter
     * @return string compiled code
     */
    public function compile($args, $compiler, $parameter)
    {
        // check and get attributes
        $_attr = $this->getAttributes($compiler, $args);
        // must endblock be nocache?
        if ($compiler->nocache) {
            $compiler->tag_nocache = true;
        }

        list($openTag) = $this->closeTag($compiler, array('novel_book'));

        return "<?php } ?>";
    }

}

///**
// * 内部函数
// * 获取小说信息
// * @param array $params
// * @return array
// */
//function _fw_get_book_list($params)
//{
//    if (!Yii::app()->hasModule("book")) {
//        return array();
//    }
//
////    return array();
//
//    Yii::import("book.models.*");
//
//    $sql = "select * from book where status=1 ";
//
//    if (isset($params['cid']) && is_array($params['cid'])) {
//        $cid = $params['cid'];
//
//        $sql .= ' and cid in(' . implode(',' , $cid) . ")";
//
//    }
//
//    if (isset($params['id']) && is_array($params['id'])) {
//
//        $sql .= ' and id in(' . implode(',' , $params['id']) . ")";
//    }
//
//
//    if (isset($params['recommend']) && is_array($params['recommend'])) {
//        $recommendLevel = $params['recommend'];
//
//        $sql .= ' and recommendlevel in(' . implode(',' , $recommendLevel) . ")";
//    }
//
//    if (isset($params['where'])) {
//        $where = $params['where'];
//
//        $where = trim($where, "'");
//        $sql .= " and " . $where;
//    }
//
//
//    if (isset($params['order'])) {
//        $order = $params['order'];
//        $order =  trim($order, "'");
//    } else {
//        $order = 'createtime desc';
//    }
//
//    $sql .=  " order by " . $order;
//
//    if (isset($params['limit'])) {
//        $limit = intval($params['limit']);
//    } else {
//        $limit = 10;
//    }
//
//    $sql .= " limit " . $limit;
//    $db = Yii::app()->db;
//
//    $cmd = $db->createCommand($sql);
//
//    $list = $cmd->queryAll();
//
//    $newList = array();
//
//    $bookIdList = array();
//    $cidList = array();
//    foreach ($list as $v) {
//        $bookIdList[] = $v['id'];
//        $cidList[] = $v['cid'];
//        $v = (Object)$v;
//        $newList[] = $v;
//    }
//
//    unset($list);
//
//    // 查询封面图
//    $imageMap = array();
//    if (!empty($bookIdList)) {
//        $sql = 'select bookid, imgurl from book_image where iscover=1 and bookid in(' . implode(',' , $bookIdList) . ")";
//        $cmd = $db->createCommand($sql);
//        $imageList = $cmd->queryAll();
//
//        //
//        foreach ($imageList as $v) {
//            $imageMap[$v['bookid']] = $v['imgurl'];
//        }
//    }
//
//    // 查询分类
//    $categoryMap = array();
//    if (!empty($cidList)) {
//        $sql = 'select * from category where id in(' . implode(',' , $cidList) . ")";
//        $cmd = $db->createCommand($sql);
//        $catList = $cmd->queryAll();
//
//        foreach ($catList as $v) {
//            $v['url'] = Yii::app()->createUrl('book/list/index', array('title' => $v['shorttitle']));
//            $categoryMap[$v['id']] = (Object)$v;
//        }
//    }
//
//    $defaultImageUrl = Yii::app()->theme->baseUrl . "/images/nocover.jpg";
//
//    foreach ($newList as $k => $v) {
//        $v->coverImageUrl = isset($imageMap[$v->id]) ? H::getStaticAbsoluteUrl( $imageMap[$v->id] , false) : $defaultImageUrl;
//        $v->category = $categoryMap[$v->cid];
//        $v->url =  Yii::app()->createUrl('book/detail/index', array('id' => $v->id));
//    }
//
////    var_dump($newList);
//
//    return $newList;
//}
