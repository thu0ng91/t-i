<?php
/**
 * Class InstallController
 *
 * @author pizigou <pizigou@yeah.net>
 */
class InstallController extends CController
{
    public $layout = 'setup';

//    protected $lockFile = 'install.lock';
    protected $dbFile = 'db.sql';


    public function init()
    {
        parent::init();

        // 强制使用bootstrap 作为安装主题
        Yii::app()->theme = 'system';
    }

    public function beforeAction($action)
    {
        if ($action->id != 'finish' && $action->id != 'upgrade' && H::checkIsInstall()) {
            Yii::app()->user->setFlash('actionInfo','已经成功安装了小说系统，不需要重新安装！');
            $this->redirect(array('install/finish'));
        }
        return true;
    }

    public function actionIndex()
    {
        $this->redirect('setup');
    }

    /**
     * 数据库安装
     */
    public function actionSetup()
    {
        $model = new SetupForm();

        if(isset($_POST['SetupForm']))
        {
            $model->attributes = $_POST['SetupForm'];

            if($model->validate()){

                $model->dbname = trim($model->dbname);

                // 数据配置校验
                $dsn = 'mysql:host='. $model->dbhost . ';dbname=' . $model->dbname;

                try {
                    $db = new CDbConnection($dsn, $model->username, $model->password);
                    $db->setActive(true);
                } catch (Exception $e) {

                    try {
                        $dsnTry =  'mysql:host='. $model->dbhost . ';dbname=';
                        $db = new CDbConnection($dsnTry, $model->username, $model->password);
                        $db->setActive(true);

                        $sql = "CREATE DATABASE IF NOT EXISTS `" . $model->dbname . "` default charset utf8";
                        $db->createCommand($sql)->execute();
                        $db->setActive(false);

                    } catch (Exception $ex) {
                        Yii::app()->user->setFlash('actionInfo','安装错误！数据库创建失败！请确认数据库账号是否有权限！');
                        $this->refresh();
                    }

                    try {
                        $db = new CDbConnection($dsn, $model->username, $model->password);
                        $db->setActive(true);
                    } catch (Exception $e) {
                        Yii::app()->user->setFlash('actionInfo','安装错误！数据库链接失败！请确认数据库账号是否有权限！');
                        $this->refresh();
                    }
                }


                if (false === $this->writeDbConfig($dsn, $model->username, $model->password)) {
                    Yii::app()->user->setFlash('actionInfo','安装错误！数据库配置写入失败！请给 runtime 目录777权限！');
                    $this->refresh();
                }

                // 导入数据库文件
                if (!$this->importDbFile($db)) {
                    Yii::app()->user->setFlash('actionInfo','安装错误！创建数据表失败！请联系作者！');
                    $this->refresh();
                }

                $db->setActive(false);

//                Yii::app()->user->setFlash('actionInfo','恭喜，安装成功！');
                $this->redirect(array('setupBaseConfig'));

            } else {
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                }
                Yii::app()->user->setFlash('actionInfo', $msg);
                $this->refresh();
            }
        }
        //$this->render('login',array('model'=>$model));
        $this->render('setup',array('model'=>$model));
    }

    /**
     * 基础信息安装
     */
    public function actionSetupBaseConfig()
    {
        $cacheCategory =  'system';
        $model = new SystemBaseConfig();

        if(isset($_POST['SystemBaseConfig']))
        {
            $model->attributes = $_POST['SystemBaseConfig'];

            if(!$model->validate()){
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                }
                Yii::app()->user->setFlash('actionInfo', $msg);
                $this->refresh();
            } else {
                Yii::app()->settings->set(get_class($model), $model, $cacheCategory);
                Yii::app()->settings->deleteCache($cacheCategory);
//                Yii::app()->user->setFlash('actionInfo','恭喜，安装成功！');
                $this->redirect('setupAdminUser');
            }
        }

        $this->render('baseconfig',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }

    /**
     * 后台用户安装
     */
    public function actionSetupAdminUser()
    {
        $cacheCategory =  'system';
        $model = new AdminUser();

        if(isset($_POST['AdminUser']))
        {
            $model->attributes = $_POST['AdminUser'];

            if(!$model->validate()){
                $msg = "";
                foreach ($model->getErrors() as $err) {
                    $msg .= array_shift($err) . "<br />";
                }
                Yii::app()->user->setFlash('actionInfo', $msg);
                $this->refresh();
            } else {

                $model->save();

                // 安装成功，创建安装锁定文件
                $this->createLockFile();
                Yii::app()->user->setFlash('actionInfo','恭喜，云阅小说系统安装成功！请先登录后台安装必备模块！');

                $this->sendStats();
                $this->redirect('finish');
            }
        }

        $this->render('adminuser',array(
            'model'=> $model,
//			'categorys'=>Category::model()->showAllSelectCategory(),
        ));
    }    

    /**
     * 安装完成提示
     */
    public function actionFinish()
    {
        $this->render('finish');
    }

    /**
     *
     */
    public function actionUpgrade()
    {
        $this->dbFile = 'upgrade.sql';

        $r = $this->importDbFile(Yii::app()->db);

        if ($r) {
            Yii::app()->user->setFlash('actionInfo','恭喜，云阅小说系统升级成功！请先登录后台安装必备模块！');
        } else {
            Yii::app()->user->setFlash('actionInfo','很遗憾，云阅小说系统升级失败！请联系云阅官方处理！www.yunyuewang.com');
        }

        $this->redirect('finish');
    }

    /**
     * @param $dsn
     * @param $username
     * @param $password
     * @return int|boolean
     */
    protected function writeDbConfig($dsn, $username, $password)
    {
        $dbConfigFile = Yii::app()->runtimePath .'/db.config.php';

        $dbConfig = @include $dbConfigFile;

        $dbConfig['connectionString'] = $dsn;
        $dbConfig['username'] = $username;
        $dbConfig['password'] = $password;

        $s = "<?php \n return ";
        $s .= var_export($dbConfig, true);
        $s .= ";\n?>";



        return file_put_contents($dbConfigFile, $s, LOCK_EX);
    }



    /**
     * 创建安装锁定文件
     */
    protected function createLockFile()
    {
        $lockFile = Yii::app()->runtimePath . "/" . Yii::app()->params['lockFile'];
        file_put_contents($lockFile, date('Y-m-d H:i:s'), LOCK_EX);
    }

    /**
     * 导入数据库文件
     * @param $db CDbConnection
     * @return bool
     */
    protected function importDbFile($db)
    {
        $dbFile =  Yii::app()->runtimePath . "/" . $this->dbFile;

        try {
            $sqlText = file_get_contents($dbFile);

            $sqlList = explode(";", $sqlText);

            foreach ($sqlList as $sql) {
                $sql = trim($sql);
                if ($sql != "")
                    $db->createCommand($sql)->execute();
            }
        } catch (Exception $ex) {
            echo $ex->getMessage(); exit;
            return false;
        }

        return true;
    }

    /**
     * 发送基本统计信息
     */
    protected function sendStats()
    {
        $domain = Yii::app()->request->getHostInfo();

        if (false !== strpos($domain, 'localhost') || false !== strpos($domain, '127.0.0.1')) {
            return;
        }
//        $version = FWXSVersion;
        $url = 'http://www.yunyuewang.com/index.php?r=zhanzhangTongji/index&domain=' . $domain . '&version=' . FWXSVersion;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_exec($ch);
        curl_close($ch);
    }
}