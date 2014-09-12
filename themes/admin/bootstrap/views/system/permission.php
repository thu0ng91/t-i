<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 权限控制';
?>
<ul class="nav nav-tabs">
  <li><a href="<?php echo Yii::app()->createUrl('system/tempconf')?>">页面控制</a></li>
  <li class="active">
    <a href="#">权限控制</a>
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

      <?php echo $form->dropDownListRow($model, 'downPermission',array('1'=>'开启','2'=>'关闭')); ?>
      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>


    <?php $this->endWidget(); ?>

