<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>

    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/artDialog/jquery.artDialog.js?skin=default"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/artDialog/plugins/iframeTools.js"></script>
</head>

<body>
<div style="width:100%">
    <?php echo $content; ?>
</div>
</body>
</html>
