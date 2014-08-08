<?php
/**
 * Class FWOutputCache
 */
class FWOutputCache extends COutputCache {

    public $dependCacheKey = "";

    /**
     * 默认返回NULL，但当后台需要清除缓存时，可以设置一个当前时间从而达到改变cache key 的效果
     * @param $obj FWOutputCache
     * @return null|mixed
     */
    public static function getExpression($obj)
    {
        if ($obj->dependCacheKey != "") {
            $key = "__FWOutputCache" . $obj->dependCacheKey;

            $cache = Yii::app()->getComponent($obj->cacheID);

            if ($cache) {
                return $cache->get($key);
            }
        }

        return null;
    }

    public function run()
    {
//        ob_start();
        parent::run();

        $content = ob_get_clean();

//        $content .= "<!--" . Yii::app()->request->pathInfo . "-->";
        echo $content;

//var_dump($content);
//        $this->makeHtml($content);
//        var_dump($cfg, $this->owner->module->id);

//        if (isset($this->owner->module) && $this->owner->module->id == 'book') {
//            $cfg = Yii::app()->settings->get("BookHtmlConfig", 'book-config-makehtml');
//
//            if ($this->owner->id == 'detail' && $this->owner->action->id == 'index') {
//                if ($cfg->BookDetailIndexIsMakeHtml == 1) { // 小说目录页符合生成静态条件
//                    $this->makeHtml($content);
//                }
//            } elseif ($this->owner->id == 'chapter' && $this->owner->action->id == 'index') {
//                if ($cfg->BookChapterIsMakeHtml == 1) { // 阅读页符合生成静态条件
//                    $this->makeHtml($content);
//                }
//            }
//        }
    }

    /**
     * 生成静态文件
     * @param $content
     */
    public function makeHtml($content)
    {
        $dir = dirname(Yii::app()->request->pathInfo);
        $fileName = basename(Yii::app()->request->pathInfo);

        $dir = FW_ROOT_PATH . DS . $dir;
        @mkdir($dir, 0777, true);

        @chmod($dir, 0777);
        $filePath = $dir . DS . $fileName;

        file_put_contents($filePath, $content);
    }
}