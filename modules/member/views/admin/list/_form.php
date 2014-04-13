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
        '会员管理' => Yii::app()->createUrl("member/admin/list/index"),
//        '会员分卷管理' => Yii::app()->createUrl("book/admin/volume/index", array("bookid" => isset($book) ? $book->id : $model->book->id)),
        $this->action->id == 'create' ? "添加会员" : "编辑会员",
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
//      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

<?php if ($this->action->id == 'update'): ?>
    <?php echo $form->textFieldRow($model, 'username', array('readonly' => true)); ?>
    <?php echo $form->passwordFieldRow($model, 'password', array('value' => "********************************", 'hint' => "不修改会员密码请保持不变")); ?>
    <?php echo $form->passwordFieldRow($model, 'repassword', array('value' => "********************************")); ?>
<?php else: ?>
    <?php echo $form->textFieldRow($model, 'username'); ?>
    <?php echo $form->passwordFieldRow($model, 'password'); ?>
    <?php echo $form->passwordFieldRow($model, 'repassword'); ?>
<?php endif;?>

<?php echo $form->textFieldRow($model, 'email'); ?>

<?php if ($this->action->id == 'update'): ?>
    <?php echo $form->dropDownListRow($model, 'status', Yii::app()->params['statusAction']); ?>
<?php endif; ?>

<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>
