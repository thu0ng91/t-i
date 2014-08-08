<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说连载模块静态配置';
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'BookHtmlConfig-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
//      'htmlOptions'=>array('class'=>'well'),
    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>


<?php echo $form->dropDownListRow($model, 'BookDetailIndexIsMakeHtml', array('-1' => '请选择', '1' => '是', '0' => '否'),  array(
    'hint'=> "开启静态后，如果需要恢复伪静态请手动删除静态目录"
)); ?>

<?php echo $form->dropDownListRow($model, 'BookChapterIsMakeHtml', array('-1' => '请选择', '1' => '是', '0' => '否'),  array(
    'hint'=> "开启静态后，如果需要恢复伪静态请手动删除静态目录"
)); ?>





<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>

