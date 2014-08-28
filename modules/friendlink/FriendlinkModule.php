<?php
class FriendlinkModule extends FWModule
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

        $dbFile =  FW_MODULE_BASE_PATH . DS . "friendlink"  . DS . "data" . DS . "friendlink.sql";

        try {
            DbHelper::importSqlFile($db, $dbFile);
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
        $cmd->dropTable("friendlink");
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