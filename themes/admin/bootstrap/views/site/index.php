<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=> Yii::app()->name,
)); ?>

<h4><?php $this->widget('bootstrap.widgets.TbLabel', array(
        'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
        'label'=> Yii::app()->user->name,
    )); ?>　您好！欢迎使用<?php echo Yii::app()->name;?> ,我们的官方网站：<a href="http://www.yunyuewang.com">点击访问</a></h4>

<p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'size' => 'normal',
        'label' => '获取更多帮助',
        'url' => 'http://www.yunyuewang.com/bbs',
        'htmlOptions' => array('target' => '_blank'),
    )); ?></p>

<?php $this->endWidget(); ?>
<div style="">
	<iframe src="http://www.yunyuewang.com/index.php?r=yunyue/iframenotice" width="500" height="200"></iframe>
</div>
