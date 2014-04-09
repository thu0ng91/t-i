<?php
/**
 * 小说系统自定义编译函数基类
 * @author pizigou<pizigou@yeah.net>
 */
abstract class Smarty_Internal_Book_Compilebase extends Smarty_Internal_CompileBase {

    protected function custom_var_export($var)
    {
        $str = "";


        if (is_array($var) || is_object($var)) {
            $str = "array( \n";
        } else {
            return $var;
        }

        foreach ($var as $k => $v) {
            $str .= "'" . $k . "' => ";

            if (is_array($v) || is_object($v)) $str .= $this->custom_var_export($v);
            elseif (is_string($v)) {
                if (strpos($v, '$') === 0) $str .= $v;
                elseif (strpos($v, 'array') === 0) $str .= $v;
                elseif (empty($v)) $str .= "''";
                else $str .= "'" . trim($v, "'") . "'";
            } elseif (empty($v)) {
                $str .= "''";
            } else $str .= $v;

            $str .= ",\n";
        }

        $str .= ")";

        return $str;
    }
}