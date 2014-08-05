<?php
$this->pageTitle=Yii::app()->name . ' - 添加'.Yii::app()->controller->module['blocktype'][$type];
?>

<?php $this->renderPartial('_form', array(
    'model' => $model,
    'categories' => $categories,
	'type' => $type,
	'vars'=>$vars
)); ?>

