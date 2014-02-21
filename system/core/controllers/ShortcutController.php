<?php
/**
 * 桌面快捷方式
 * Class ShortController
 */
class ShortcutController extends FWFrontController
{
    /**
     * 下载
     */
    public function actionDownload()
    {
        $url = H::getAbsoluteUrl();

        $shortcut=<<<EOF
[InternetShortcut]

URL={$url}

IconFile={$url}/favicon.ico

IconIndex=0

HotKey=1613

IDList=

[{000214A0-0000-0000-C000-000000000046}]

Prop3=19,2
EOF;

        header("Content-Type: application/octet-stream");
        $title = iconv("UTF-8", "GBK//ignore", Yii::app()->name);
        header("Content-Disposition: attachment; filename=" . $title .".url");

        echo $shortcut;
        Yii::app()->end();
    }
}
