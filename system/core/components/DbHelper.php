<?php
/**
 * 数据库辅助方法
 * @author pizigou<pizigou@yeah.net>
 */

class DbHelper {

    /**
     * 给SQL语句添加table prefix
     * 主要用于CActiveRecord 非懒加载时，多个表jion字段相同的情况
     * @param string $sql
     * @param string $tblAlias
     * @return string
     */
    public static function addTablePrefixWithSql($sql, $tblPrefix = 't')
    {
        $list = explode(",", $sql);

        foreach ($list as $k => $v) {
            $list[$k] = $tblPrefix . "." . trim($v);
        }

        $sql = implode(",", $list);

        return $sql;
    }
}