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
}