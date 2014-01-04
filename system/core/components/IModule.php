<?php
/**
 * 模块接口
 * interface IModule
 */
interface IModule {
    /**
     * 安装时调用
     * @return boolean
     */
    public function install();

    /**
     * 删除时调用
     * @return boolean
     */
    public function uninstall();

    /**
     * 升级时调用
     * @return boolean
     */
    public function upgrade();
}