<?php
class BookModule extends FWModule
{
    public $cacheConfig = null;

    public function init()
    {
        parent::init();

        $this->rewriteConfig();

        $this->cacheConfig = Yii::app()->settings->get("BookCacheConfig", 'book-cache');
    }

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
        $m = Yii::app()->settings->get("BookRewriteConfig", "book");
        if ($m) {
            if ($m->BookCategoryRule) {
                $r = $m->BookCategoryRule;
                $r = str_replace('{pinyin}', '<title:\w+>', $r);
                $r = str_replace('{id}', '<id:\d+>', $r);
                $r = array( $r =>  'book/list/index');
                Yii::app()->urlManager->addRules($r, false);
            }

            if ($m->BookIndexRule) {
                $r = $m->BookIndexRule;
                $r = str_replace('{id}', '<id:\d+>', $r);
                $r = str_replace('{dir}', '<dir:\d+>', $r);
                $r = array( $r =>  'book/detail/index');
                Yii::app()->urlManager->addRules($r, false);
            }

            if ($m->BookChapterDetailRule) {
                $r = $m->BookChapterDetailRule;
                $r = str_replace('{bookid}', '<bookid:\d+>', $r);
                $r = str_replace('{id}', '<id:\d+>', $r);
                $r = str_replace('{dir}', '<dir:\d+>', $r);
                $r = array( $r =>  'book/chapter/index');
                Yii::app()->urlManager->addRules($r, false);
            }

            if ($m->BookSearchRule) {
                $r = $m->BookSearchRule;
                $r = array( $r =>  'book/list/search');
                Yii::app()->urlManager->addRules($r, false);
            }

            if ($m->BookLastupdateRule) {
                $r = $m->BookLastupdateRule;
                $r = array( $r =>  'book/list/lastupdate');
                Yii::app()->urlManager->addRules($r, false);
            }

            if ($m->BookRankRule) {
                $r = $m->BookRankRule;
                $r = array( $r =>  'book/list/rank');
                Yii::app()->urlManager->addRules($r, false);
            }
        }
        return;
    }
}