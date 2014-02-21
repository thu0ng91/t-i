<?php
/**
 * Created by JetBrains PhpStorm.
 * User: think
 * Date: 13-9-27
 * Time: 下午11:13
 * To change this template use File | Settings | File Templates.
 */
Yii::import('ext.chinese.JChinese');

class H {

    /**
     * 获取字符串对应的拼音
     * @param $str
     * @param $isTrimBank 是否去除拼音之间的空格
     * @return string
     */
    public static function getPinYin($str, $isTrimBank = true)
    {


        $c = new JChinese('GB2312', 'PinYin');

        $str = iconv('UTF-8', 'GB2312//IGNORE', $str);
//        echo $str;exit;
//        $c->setSourceText($str);

        $str =  $c->convert($str);

        if ($isTrimBank) {
            $str = str_replace(' ', "", $str);
        }

        return $str;
    }

    /**
     * 裁剪自定长度字符串，去除掉字符串中的HTML和PHP标签
     * @param $str
     * @param $len
     * @param string $suffix
     * @return string
     */
    public static function substr($str, $len, $suffix = "...")
    {
        $str = trim(strip_tags($str));
        $str = str_replace("&nbsp;", "", $str);
        mb_internal_encoding("UTF-8");
        return mb_substr($str, 0, $len) . $suffix;
    }

    /**
     * 获取小说图片的WEB可访问地址
     * @param $imageUrl
     * @return string
     */
    public static function getNovelImageUrl($imageUrl)
    {
        if (preg_match('/^http:\/\//', $imageUrl) > 0) return $imageUrl;

        $baseUrl = Yii::app()->baseUrl;
        if (preg_match('/^\//', $imageUrl) == 0 && preg_match('/\/$/', $baseUrl) == 0) $baseUrl .= '/';

        return $baseUrl . $imageUrl;
    }

    /**
     * 检查是否已经安装过程序
     * @return bool
     */
    public static function checkIsInstall()
    {
        $lockFile = Yii::app()->runtimePath . "/" . Yii::app()->params['lockFile'];

        return file_exists($lockFile);
    }

    /**
     * 获取字数
     * @param $content
     * @param string $encoding
     * @return int
     */
    public static function getWordCount($content, $encoding = "UTF-8")
    {
        if (empty($content)) return 0;

        return mb_strlen($content, $encoding);
    }

    /**
     * 递归删除目录
     * @param $dir
     */
    public static function rrmdir($dir)
    {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (filetype($dir. DS .$object) == "dir") self::rrmdir($dir. DS .$object);
                    else @unlink($dir. DS .$object);
                }
            }
            reset($objects);
            @rmdir($dir);
        }
    }

    /**
     * 获取当前项目的绝对地址
     * @param $url
     * @return string
     */
    public static function getAbsoluteUrl($url = '')
    {
        if (preg_match('/^http:\/\//', $url) > 0) return $url;

        $baseUrl = Yii::app()->baseUrl;
        if (preg_match('/^\//', $url) == 0) $baseUrl = '/' . $baseUrl;
        if (preg_match('/\/$/', $url) == 0) $baseUrl .= '/';

        $baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseUrl;
        return $baseUrl . $url;
    }
}