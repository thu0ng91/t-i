<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>
<script src="/themes/admin/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
$(function(){
if ($('#editor1').length > 0) {
	var ckeditor_upload_url = $("#ckeditor_upload_url").val();

	CKEDITOR.replace('editor1', {
		filebrowserUploadUrl:ckeditor_upload_url,
		width:'600px',
		height:'250px',
		toolbar: [
			{name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
			{ name: 'styles', items: [ 'Font', 'FontSize', 'TextColor', 'BGColor'] },
			{ name: 'insert', items: [ 'Image', 'Table','Link', 'Unlink'] },
			[ 'Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
			['Source']
]
}); 
}
});
</script>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '专题管理' => Yii::app()->createUrl("special/admin/list/index"),
        $this->action->id == 'create' ? "添加专题" : "编辑专题",
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


<?php echo $form->textFieldRow($model, 'title'); ?>
<?php echo $form->textFieldRow($model, 'author'); ?>
<?php echo $form->textAreaRow($model, 'content',array('hint'=>'*这里可以填写专题导读信息')); ?>
<?php echo $form->dropDownListRow($model, 'template', $arr_file); ?>
<?php echo $form->dropDownListRow($model, 'status', array('1'=>'显示','2'=>'隐藏')); ?>
<input type="hidden" id="ckeditor_upload_url" value="<?php echo Yii::app()->createUrl("/special/admin/list/upload");?>"/>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>


