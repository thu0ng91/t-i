<?php

/**
 * 从飞舞v1.2.4 升级到 云阅v1.0.0
 */

$dbConfigFile = './runtime/front/db.config.php';

$upgradeDbSqlFile = './runtime/front/upgrade.sql';

$cfg = include_once $dbConfigFile;


header("content-type: text/html;charset=utf-8");

$db = null;

try {
    $db = new PDO($cfg['connectionString'], $cfg['username'], $cfg['password']);

} catch (PDOException $e) {
    echo '数据库错误: ' . $e->getMessage();
    exit;
}


$sqlText = file_get_contents($upgradeDbSqlFile);

$sqlList = explode(";", $sqlText);

foreach ($sqlList as $sql) {
    $sql = trim($sql);
    if ($sql != "")
        $db->exec($sql);
}

echo "升级成功";
exit;