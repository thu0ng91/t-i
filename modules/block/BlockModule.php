<?php
class BlockModule extends FWModule
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

        $dbFile =  FW_MODULE_BASE_PATH . DS . "block"  . DS . "data" . DS . "block.sql";

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
        // Url 重写
//        $m = Yii::app()->settings->get("BookRewriteConfig", "book");
//        if ($m) {
//
//            if ($m->BookCategoryRule) {
//                $r = $m->BookCategoryRule;
//                $r = str_replace('{pinyin}', '<title:\w+>', $r);
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'book/list/index');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->BookIndexRule) {
//                $r = $m->BookIndexRule;
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'book/detail/index');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->BookChapterDetailRule) {
//                $r = $m->BookChapterDetailRule;
//                $r = str_replace('{bookid}', '<bookid:\d+>', $r);
//                $r = str_replace('{id}', '<id:\d+>', $r);
//                $r = array( $r =>  'book/chapter/index');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->BookSearchRule) {
//                $r = $m->BookSearchRule;
//                $r = array( $r =>  'book/list/search');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->BookLastupdateRule) {
//                $r = $m->BookLastupdateRule;
//                $r = array( $r =>  'book/list/lastupdate');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//            if ($m->BookRankRule) {
//                $r = $m->BookRankRule;
//                $r = array( $r =>  'book/list/rank');
//                Yii::app()->urlManager->addRules($r, false);
//            }
//
//        }
        return;
    }
}