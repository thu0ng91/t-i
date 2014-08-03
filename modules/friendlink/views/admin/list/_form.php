<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '友链管理' => Yii::app()->createUrl("friendlink/admin/list/index"),
        $this->action->id == 'create' ? "添加友链" : "编辑友链",
    ),
)); ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'member-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>


<?php echo $form->textFieldRow($model, 'name'); ?>
<?php echo $form->textFieldRow($model, 'url'); ?>
<?php echo $form->textFieldRow($model, 'sequence'); ?>
<?php echo $form->textAreaRow($model,'description',array('class'=>'span5','style'=>'width:500px;height:100px')); ?>
<?php echo $form->dropDownListRow($model, 'type', array('1'=>'图片','2'=>'文字')); ?>
<?php echo $form->dropDownListRow($model, 'status', array('1'=>'显示','2'=>'隐藏')); ?>
<?php echo $form->fileFieldRow($model,'logo');

	if(isset($model->logo) && $model->logo) {
		echo CHtml::image(DS.$model->logo,'',array('width' => 100,'style' => 'margin-left:180px;margin-bottom:20px;'));
	}
?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>


