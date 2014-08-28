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

    /**
     * 导入sql 文件
     * @param $db
     * @param $sqlFile
     */
    public static function importSqlFile(&$db, $sqlFile)
    {
        $sqlList = file($sqlFile);
        $templine = '';

        foreach ($sqlList as $line) {

            if (substr($line, 0, 2) == '--' || $line == '')
                continue;

            $templine .= $line;

            if (substr(trim($line), -1, 1) == ';')
            {
                $db->createCommand($templine)->execute();
                $templine = '';
            }
        }
    }
}