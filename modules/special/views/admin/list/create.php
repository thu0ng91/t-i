<?php
$this->pageTitle=Yii::app()->name . ' - 添加专题';
?>

<?php $this->renderPartial('_form', array(
    'model' => $model,'arr_file'=>$arr_file
)); ?>

