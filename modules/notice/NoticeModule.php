<?php
class NoticeModule extends FWModule
{
    public function init()
    {
        parent::init();

        $this->rewriteConfig();
    }

    /**
     * 安装时调用
     * @return bool
     */
    public function install()
    {
        $db = Yii::app()->db;

        $dbFile =  FW_MODULE_BASE_PATH . DS . "notice"  . DS . "data" . DS . "notice.sql";

        try {
            $sqlText = file_get_contents($dbFile);

            $sqlList = explode(";", $sqlText);

            foreach ($sqlList as $sql) {
                $sql = trim($sql);
                if ($sql != "")
                    $db->createCommand($sql)->execute();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return false;
        }

        return true;
    }

    /**
     * 卸载时调用
     * @return bool
     */
    public function uninstall()
    {
        $cmd = Yii::app()->db->createCommand();
        $cmd->dropTable("notice");
        return true;
    }

    /**
     * 升级时调用
     * @param $currentVersion
     * @return boolean
     */
    public function upgrade($currentVersion)
    {
        return true;
    }

    protected function rewriteConfig()
    {
        return;
    }
}