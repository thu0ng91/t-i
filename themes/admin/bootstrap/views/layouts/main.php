<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php
$menus = array(
    array('label'=> '系统', 'url'=> 'system/base', 'active' => $this->menupanel[0] == 'system' ? true : false),
//    array('label'=> '小说管理', 'url'=> 'book/index', 'active' => $this->menupanel[0] == 'book' ? true : false),
//    array('label'=> '友链管理', 'url'=> 'friendlink/index', 'active' => $this->menupanel[0] == 'friendlink' ? true : false),
//    array('label'=> '新闻管理', 'url'=> 'news/index', 'active' => $this->menupanel[0] == 'news' ? true : false),
//    array('label'=> '广告管理', 'url'=> 'ads/index', 'active' => $this->menupanel[0] == 'ads' ? true : false),
//    array('label'=> '用户管理', 'url'=> 'user/index', 'active' => $this->menupanel[0] == 'user' ? true : false),
    array('label'=> '模块管理', 'url'=> 'modules/index', 'active' => $this->menupanel[0] == 'modules' ? true : false),
);

$menus = CMap::mergeArray($this->topMenus, $menus);

foreach ($menus as $k => $v) {
    $v['url'] = Yii::app()->createUrl($v['url']);
    $menus[$k] = $v;
}

$this->widget('bootstrap.widgets.TbNavbar',array(
	'type' => 'inverse',
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=> $menus,
        ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=> array(
                array('label'=>'浏览网站', 'url'=> Yii::app()->baseUrl != "" ? Yii::app()->baseUrl : "/", 'visible'=> !Yii::app()->user->isGuest, 'linkOptions' => array(
                    'target' => '_blank',
                )),
                array('label'=>'登录', 'url'=> Yii::app()->createUrl('site/login'), 'visible'=> Yii::app()->user->isGuest),
                array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=> Yii::app()->createUrl('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="clear"></div>
<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

<div class="container-fluid">
  <div class="row-fluid">
	<div class="span3">
		<?php $this->renderPartial('//layouts/left-menu'); ?>
	</div>
	  <div class="span9">
        <?php $this->renderPartial('//layouts/flash-message'); ?>
		<?php echo $content; ?>
	  </div>
  </div>
</div>
	
	<div class="clear"></div>

	<div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by <?php echo Yii::app()->name; ?> <br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
