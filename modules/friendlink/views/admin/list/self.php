<?php
$this->pageTitle=Yii::app()->name . ' - 添加'.Yii::app()->controller->module['blocktype'][$type];
?>
<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '区块管理' => Yii::app()->createUrl("block/admin/list/index"),
        $this->action->id == 'create' ? "添加".Yii::app()->controller->module['blocktype'][$type] : "编辑".Yii::app()->controller->module['blocktype'][$type],
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


<?php echo $form->textFieldRow($model, 'blockname'); ?>
<?php echo $form->textFieldRow($model, 'sequence'); ?>
<?php echo CHtml::hiddenField('Block[blocktype]',$type); ?>
<?php echo $form->dropDownListRow($model, 'status', Yii::app()->controller->module['blockstatus']); ?>
<?php echo $form->textAreaRow($model,'template',array('class'=>'span5','style'=>'width:500px;height:100px','hint'=>'{$block}代表区块内容<br />{$blockname}代表区块标题')); ?>
<?php echo $form->textAreaRow($model,'content',array('class'=>'span5','style'=>'width:500px;height:200px','hint'=>'可以放置广告代码，统计等自定义的内容')); ?>
<?php echo $form->textFieldRow($model, 'cachetime',array('hint'=>'根据设置的秒数自动更新数据')); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>
