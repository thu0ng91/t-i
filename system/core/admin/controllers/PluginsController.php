<?php
/**
 * 插件管理
 * Class PluginsController
 */
class PluginsController extends FWAdminController
{
    protected function menus()
    {
        return array(
            'modules',
        );
    }

    protected $message = array(
        'install_error:plugsin_is_installed' => '安装插件失败，插件已经安装',
        'install_error:fwversion_not_support' => '安装插件失败，该插件依赖飞舞小说系统版本为：%s，当前飞舞系统版本为：%s',
        'install_error' => '安装插件失败',
        'install_success' => '安装插件成功',
        'uninstall_error' => '卸载插件失败',
        'uninstall_success' => '卸载插件成功',
        'stop_error' => '停止插件失败',
        'stop_success' => '停止插件成功',
        'start_error' => '启用插件失败',
        'start_success' => '启用插件成功',
        'scan_result' => '找到 %d 个未安装插件，%d 个需升级插件',
    );

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria();

        if(!empty($_GET['Plugins']['title']))
            $criteria->addSearchCondition('title',$_GET['Plugins']['title']);


//        $criteria->addNotInCondition('status', array(Yii::app()->params['status']['isdelete']));

		$dataProvider=new CActiveDataProvider('Plugins',array(
			'criteria'=>$criteria,
			'pagination'=>array(
        		'pageSize'=>Yii::app()->params['girdpagesize'],
    		),
            'sort'=>array(
                'defaultOrder'=>array(
                    'id' => CSort::SORT_DESC,
                ),
                'attributes'=>array(
                    'id',
                    'createtime',
                    'sort',
                ),
            ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
//			'categorys'=> Category::model()->showAllSelectCategory(Category::SHOW_ALLCATGORY),
            'model' => Plugins::model(),
		));
	}

    /**
     * 扫描本地目录
     */
    public function actionScan()
    {
        $localPlugins = $this->scanPlugins();

        $modules = Plugins::model()->findAll();

        $upgradeCount = 0;
        foreach ($modules as $k => $v) {
            if (isset($localPlugins[$v->name])) {
                if (version_compare($localPlugins[$v->name]['config']['version'], $v->version) > 0) { // 发现升级版
                    if (version_compare($localPlugins[$v->name]['config']['version'], $v->upgradeversion) > 0) {
                        $v->upgradeversion = $localPlugins[$v->name]['config']['version'];
    //                    $v->status = -1; // 发现升级版，直接禁用掉当前版本
                        $v->save();
                        $upgradeCount++;
                    }
                }
                unset($localPlugins[$v->name]);
            }
        }
        $count = 0;
        if (is_array($localPlugins)) {
            reset($localPlugins);

            foreach ($localPlugins as $k => $v) {
                $m = new Plugins();
                $m->title = $v['config']['name'];
                $m->name = $k;
                $m->author = $v['config']['author'];
                $m->version = $v['config']['version'];
                $m->fwversion = $v['config']['fwversion'];
                $m->description = $v['config']['description'];
                $m->adminmenus = serialize($v['config']['adminmenus']);
                $m->createtime = time();
                $m->updatetime = time();
                $m->status = 0;

                $m->save();
                $count++;
            }
        }

        $r = sprintf($this->message['scan_result'], $count, $upgradeCount);

        echo $r;

        Yii::app()->end();
    }

    /**
     * 安装插件
     * @param $id
     */
    public function actionSetup($id)
    {
        if(!Yii::app()->request->isPostRequest) return;

        $id = intval($id);

        $m = $this->loadModel($id);
        if (!$m) {
            echo $this->message['install_error'];
            Yii::app()->end();
        }

        if ($m->status == 1) {
            echo $this->message['install_error:plugsin_is_installed'];
            Yii::app()->end();
        }

        if (version_compare(FWXSVersion, $m->fwversion) < 0) {
            $s = sprintf($this->message['install_error:fwversion_not_support'], $m->fwversion, FWXSVersion);
            echo $s;
            Yii::app()->end();
        }

        $pluginFile = FW_PLUGIN_BASE_PATH . DS . $m->name . DS ."install.php";

        try {
            include_once $pluginFile;

            $m->status = 1;
            $m->save();
            echo $this->message['install_success'];
            Yii::app()->end();
        } catch (Exception $e) {
            echo $this->message['install_error'];
            Yii::app()->end();
        }
    }

    /**
     * 升级插件
     * @param $id
     */
    public function actionUpgrade($id)
    {
        if(!Yii::app()->request->isPostRequest) return;

        $id = intval($id);

        $m = $this->loadModel($id);
        if (!$m) {
            echo $this->message['install_error'];
            Yii::app()->end();
        }

//        if ($m->status == 1) {
//            echo $this->message['install_error:plugsin_is_installed'];
//            Yii::app()->end();
//        }

        if (version_compare(FWXSVersion, $m->fwversion) < 0) {
            $s = sprintf($this->message['install_error:fwversion_not_support'], $m->fwversion, FWXSVersion);
            echo $s;
            Yii::app()->end();
        }

        $pluginFile = FW_PLUGIN_BASE_PATH . DS . $m->name . DS . "upgrade.php";

        try {
            include_once $pluginFile;
            $m->status = 1;
            $m->save();
            echo $this->message['install_success'];
            Yii::app()->end();
        } catch (Exception $e) {
            echo $this->message['install_error'];
            Yii::app()->end();
        }
    }

    /**
     * 卸载插件
     * @param int $id
     */
    public function actionDelete($id)
    {
        if(!Yii::app()->request->isPostRequest) return;

        $id = intval($id);

        $m = $this->loadModel($id);
        if (!$m) {
            echo $this->message['uninstall_error'];
            Yii::app()->end();
        }

        // 已经安装，需要先执行卸载
        if ($m->status == 1) {
            $pluginFile = FW_PLUGIN_BASE_PATH . DS . $m->name . DS . "uninstall.php";

            try {
                include_once $pluginFile;
//                $m->status = 1;
//                $m->save();
//                echo $this->message['install_success'];
//                Yii::app()->end();
            } catch (Exception $e) {
            }
        }

        // 强制卸载
        $this->loadModel($id)->delete();

        echo $this->message['uninstall_success'];
        Yii::app()->end();
    }

    /**
     * 停止插件
     * @param $id
     */
    public function actionStop($id)
    {
        if(!Yii::app()->request->isPostRequest) return;

        $id = intval($id);
        $m = $this->loadModel($id);
        if (!$m) {
            echo $this->message['stop_error'];
            Yii::app()->end();
        }

        $m->status = -1;
        $m->save();

        echo $this->message['stop_success'];
        Yii::app()->end();
    }

    /**
     * 启用插件
     * @param $id
     */
    public function actionStart($id)
    {
        if(!Yii::app()->request->isPostRequest) return;

        $id = intval($id);
        $m = $this->loadModel($id);
        if (!$m) {
            echo $this->message['start_error'];
            Yii::app()->end();
        }

        $m->status = 1;
        $m->save();

        echo $this->message['start_success'];
        Yii::app()->end();
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Plugins::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'');
		return $model;
	}

    /**
     * 扫描本地目录获取插件
     * @return array
     */
    protected function scanPlugins()
    {
        $dir = FW_PLUGIN_BASE_PATH ;

        $iterator = new DirectoryIterator($dir);
        $modules = array();
        foreach ($iterator as $f) {
            $name = $f->getFilename();
//            $ext = $f->getExtension();
//            $ext = strtolower($ext);
            if ($f->isDir() && !$f->isDot()) {
//                $pluginFile = $f->getPathname() . DS . ucfirst($name) . "install.php";
                $moduleConfigFile = $f->getPathname() . DS . "install.config.php";
                if (is_file($moduleConfigFile)) {
//                    include_once $pluginFile;
//                    $moduleCls = ucfirst($name) . "Module";
//                    if (class_exists($moduleCls)) {
//                        $m = new $moduleCls($name, null);
//                        if ($m instanceof IModule) {
                            $modules[$name] = array();
//                            $modules[$name]['module'] = $m;
                            $modules[$name]['config'] = include_once $moduleConfigFile;
//                        }
//                    }
                }
            }
        }
        return $modules;
    }
}
