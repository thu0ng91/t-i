<?php
/**
 * Allows to render a widget
 *
 * Syntax:
 * {widget name="path.to.widget.Class"}
 * {widget name="bootstrap.widgets.TbBreadcrumbs" links=['Library'=>'#', 'Data']}
 *
 * @see CBaseController::widget().
 * 
 * @param array $params
 * @param Smarty $smarty
 * @return string
 */
function smarty_function_widget($params, &$smarty){
    
    $controller_object = $smarty->_tpl_vars['this']; //extract the controller from template vars

    if ($controller_object == null) {
        throw $smarty->trigger_error("Can't get controller object from template. Error.");
    }
    
    if (!isset($params['name'])) {
        throw $smarty->trigger_error("Name parameter should be specified.");
    }
     $widgetName = $params['name'];
    unset($params['name']);

    //some widgets has 'name' property. You can pass it by '_name' parameter
    if (isset($params['_name'])) {
        $params['name'] = $params['_name'];
        unset($params['_name']);
    }
    
    return $controller_object->widget($widgetName, $params, true);
}