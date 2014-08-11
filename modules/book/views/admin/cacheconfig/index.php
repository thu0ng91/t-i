<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说连载模块缓存配置';
?>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">缓存配置</a>
  </li>
</ul>
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'cacheconfig-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    )); ?>


    <?php echo $form->dropDownListRow($model, 'BookIsCache', array('-1' => '请选择', '1' => '是', '0' => '否')); ?>
    <?php echo $form->textFieldRow($model, 'BookCategoryCacheTime', array(
      'hint'=> "单位为秒<br />1分钟为60秒，10分钟为600秒，1小时为3600秒，12小时为43200秒，24小时为86400秒"
    )); ?>

    <?php echo $form->textFieldRow($model, 'BookDetailCacheTime', array(
        'hint'=> "单位为秒"
    )); ?>
    <?php echo $form->textFieldRow($model, 'BookChapterCacheTime', array(
        'hint'=> "单位为秒"
    )); ?>
    <?php echo $form->textFieldRow($model, 'BookRankCacheTime', array(
        'hint'=> "单位为秒"
    )); ?>
    <?php echo $form->textFieldRow($model, 'BookLastupdateCacheTime', array(
        'hint'=> "单位为秒"
)); ?>



      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

