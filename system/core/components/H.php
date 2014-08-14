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
     * @param string $url
     * @param boolean $showScriptName
     * @return string
     */
    public static function getAbsoluteUrl($url = '',  $showScriptName = true)
    {
//        if (preg_match('/^http:\/\//', $url) > 0) return $url;
//
//        $baseUrl = Yii::app()->baseUrl;
//        if (preg_match('/^\//', $url) == 0) $baseUrl = '/' . $baseUrl;
//        if (preg_match('/\/$/', $url) == 0) $baseUrl .= '/';
//
//        $baseUrl = "http://" . $_SERVER['HTTP_HOST'] . $baseUrl;
//        return $baseUrl . $url;

        $url = Yii::app()->createAbsoluteUrl($url);

        if (!$showScriptName) {
            $url = str_replace('index.php', '', $url);
        }

        return $url;
    }

    /**
     * 获取静态资源的绝对地址
     * @param $url
     * @return string
     */
    public static  function getStaticAbsoluteUrl($url)
    {
        if(strpos($url,'http')===0)
            return $url;
        else
            return Yii::app()->request->getHostInfo() . ( Yii::app()->baseUrl == '' ? '/' :  Yii::app()->baseUrl) . $url;
    }

    /**
     * 简单密码加密算法
     * @param $password
     * @return string
     */
    public static function encrpyt($password)
    {
        $password = strrev($password) . $password;

        return md5($password);
    }

    /**
     * @param CActiveRecord $model
     * @param array $allowedColumns
     * @return array
     */
    public static function getNeedColumns(CActiveRecord $model, array $allowedColumns)
    {
        $columns = array();
        if ($model instanceof  CActiveRecord) {
//            $columns = array();

            if (empty($allowedColumns)) return $model->attributes;
            foreach ($model->attributes as $k => $v) {
                if (in_array($k, $allowedColumns)) {
                    $columns[$k] = $v;
                }
            }
        }

        return $columns;
    }
	/*
     * 提示跳转窗口
    * $msg 提示信息内容
    * $url 跳转地址
    * $status 状态，默认为0，显示感叹号小图标；为1时显示勾号
    * $returntime 页面跳转时间，默认为2秒
    * author:caozhong
    */
	public static function showmsg($msg, $url, $status = '', $returntime = '') {
		if (empty ( $returntime ))
			$rtime = '2';
		else
			$rtime = $returntime;
		echo '<!doctype html><html><meta charset="utf-8"><body style="text-align:center;">';
		echo '<div style="width:530px;height:200px;margin:20px auto 0;font:12px/1.5 \'Microsoft Yahei\',Tahoma,\'Simsun\'">';
		echo '<meta http-equiv="refresh" content="' . $rtime . ';url=' . $url . '">';
		echo '<div style="border:2px #2f96e3 solid;margin-top:20px;"><div style="height:50px;width:5px;background:#2f96e3;float:left;margin-top:20px;"></div>
      <div style="font-size:35px;color:#50bdda;float:left;margin-left:10px;margin-top:15px;">提示信息</div>
      <div style="clear:both;"></div>
      <div style="height:50px;width:350px;margin:0 auto;font-size:22px;color: #48BCD3;text-align:left;">
        <font style="margin-left:10px;float:left;margin-top:20px;">' . $msg . '</font>
      </div><div style="clear:both;"></div>';
		echo '<div style="height:90px;font-size:12px;"><a href="' . $url . '" style="color:#48bcd3;margin-left:-41px;">如果您的浏览器没有跳转，请点击这里……</a></div>';
		echo '</div></div></body></html>';
		exit ();
	}
}