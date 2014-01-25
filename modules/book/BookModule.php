<?php
class BookModule extends FWModule
{
    /**
     * 安装时调用
     * @return bool
     */
    public function install()
    {
        return true;
    }

    /**
     * 卸载时调用
     * @return bool
     */
    public function uninstall()
    {
        return true;
    }

    /**
     * 升级时调用
     * @return boolean
     */
    public function upgrade($currentVersion)
    {
        return true;
    }
}