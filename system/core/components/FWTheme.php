<?php
/**
 * 云阅主题机制
 * Class FWTheme
 */
class FWTheme extends CTheme {

    public function getViewFile($controller,$viewName)
    {
        $basePath = $this->getViewPath();
        $moduleViewPath=$basePath;
        if(($module=$controller->getModule())!==null)
            $moduleViewPath.='/'.$module->getId();

//        print_r($moduleViewPath);exit;
        $viewPath = $basePath.'/'.$controller->getUniqueId();


        if (!is_dir($viewPath) && $module) { // 如果没有自定义模块模板，则使用模块自带模板
            $moduleViewPath = FW_MODULE_BASE_PATH .'/'.$module->getId() . "/views";
//            $viewPath = FW_MODULE_BASE_PATH .'/'.$controller->getUniqueId() . "";
            $viewPath = $moduleViewPath . "/" . $controller->getId();
        }
//        var_dump($moduleViewPath, $viewPath, $basePath);exit;
        return $controller->resolveViewFile($viewName,$viewPath,$basePath,$moduleViewPath);
    }

    public function getLayoutFile($controller,$layoutName)
    {
        $moduleViewPath=$basePath=$this->getViewPath();
//        $module=$controller->getModule();
//        if(empty($layoutName))
//        {
//            while($module!==null)
//            {
//                if($module->layout===false)
//                    return false;
//                if(!empty($module->layout))
//                    break;
//                $module=$module->getParentModule();
//            }
//            if($module===null)
//                $layoutName=Yii::app()->layout;
//            else
//            {
//                $layoutName=$module->layout;
//                $moduleViewPath.='/'.$module->getId();
//            }
//        }
//        elseif($module!==null)
//            $moduleViewPath.='/'.$module->getId();

        return $controller->resolveViewFile($layoutName,$basePath.'/layouts',$basePath,$moduleViewPath);
    }
}