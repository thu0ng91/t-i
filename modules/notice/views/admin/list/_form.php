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
        '公告管理' => Yii::app()->createUrl("notice/admin/list/index"),
        $this->action->id == 'create' ? "添加公告" : "编辑公告",
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
<?php echo $form->textFieldRow($model, 'views'); ?>
<div class="control-group" id="showInput">
    <label class="control-label">内容<span class="required">*</span></label>
    <div class='controls' id="articleList">
       <textarea class="px media_area" id="editor1" name="Notice[content]"><?php echo $model->content;?></textarea>
    </div>
</div>

<?php echo $form->dropDownListRow($model, 'status', array('1'=>'显示','2'=>'隐藏')); ?>
<input type="hidden" id="ckeditor_upload_url" value="<?php echo Yii::app()->createUrl("/notice/admin/list/upload");?>"/>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>


