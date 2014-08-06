<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    //'heading'=> Yii::app()->name,
)); ?>

<?php //$this->widget('bootstrap.widgets.TbLabel', array(
//        'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
//        'label'=> Yii::app()->user->name,
//    )); ?><!-- -->
<p><?php echo Yii::app()->user->name;?>,您好！欢迎使用<?php echo Yii::app()->name;?> ,免费、强大的小说系统！<br /> 当前系统版本：<b><?php echo FWXSVersion;?></b> &nbsp;<?php $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'normal',
        'label' => '获取帮助',
        'url' => 'http://www.yunyuewang.com/bbs',
        'htmlOptions' => array('target' => '_blank'),
    )); ?></p>

	<iframe style="border:none;" src="http://www.yunyuewang.com/index.php?r=yunyue/iframenotice" width="500" height="200"></iframe>

<style>
.lineheight{padding-left:5px;line-height:25px;height:25px;}
</style>
	<table class="tb tb2 fixpadding" style="font-size:12px;">
<tbody><tr><th colspan="3" style="font-size:14px; font-weight:bold;text-align:left;">云阅开发团队</th></tr>
<tr><td class="lineheight">架构设计：</td><td class="lineheight">pizigou</td></tr>
<tr><td class="lineheight">功能规划：</td><td class="lineheight">go123</td></tr>
<tr><td class="lineheight">产品研发：</td><td class="lineheight">yacms 冷雨夜</td></tr>
<tr><td class="lineheight">界面设计：</td><td class="lineheight">阳阳/mg</td></tr>
<tr><td class="lineheight">相关链接</td><td class="lineheight">
		<a href="http://www.yunyuewang.com" class="lightlink2" target="_blank">公司网站</a>,
		<a href="http://www.yunyuewang.com/bbs" class="lightlink2" target="_blank">讨论区</a></td></tr></tbody></table>

<?php $this->endWidget(); ?>
