<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 页面控制';
?>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">页面控制</a>
  </li>
</ul>
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'baseconfig-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    )); ?>

      <?php echo $form->textFieldRow($model, 'PageShowNums'); ?>
      <?php echo $form->textFieldRow($model, 'LastupdateShowNums'); ?>
      <?php echo $form->textFieldRow($model, 'TopShowNums'); ?>
      <?php echo $form->dropDownListRow($model, 'commentStatus',array('1'=>'开启评论','2'=>'关闭评论')); ?>
      <?php echo $form->textFieldRow($model, 'searchtime'); ?>
      <?php echo $form->textFieldRow($model, 'searchShowNums'); ?>
      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>


    <?php $this->endWidget(); ?>

