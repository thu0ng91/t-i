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

<?php
$shaixuan = '<div class="control-group" id="showInput" style="height:30px;line-height:30px;">
    <label style="float:left;">区块选项<span class="required">*</span></label>
    <div id="articleList" style="float:left;padding-left:20px;">'.CHtml::dropDownList('sort_id',isset($vars[0]) ? $vars[0] : '',$categories,array('id'=>'sort_id','style' => 'width:100px;')).
       CHtml::dropDownList('sort_type',isset($vars[1]) ? $vars[1] : '',Yii::app()->controller->module['sorttype'],array('id'=>'sort_type','style' => 'width:100px;')).
       CHtml::dropDownList('sort_order',isset($vars[2]) ? $vars[2] : '',Yii::app()->controller->module['order'],array('id'=>'sort_order','style' => 'width:100px;')).'
    </div>
</div>';
$paixu = '<div class="control-group" id="showInput" style="height:30px;line-height:30px;">
    <label style="float:left;">指定小说ID<span class="required">*</span></label>
    <div id="articleList" style="float:left;padding-left:10px;">'.CHtml::textField('self_number',isset($vars[4]) ? $vars[4] : '',array('id'=>'self_number','style' => 'width:160px;')).'
    </div>
</div>';
$this->widget('bootstrap.widgets.TbTabs', array(
    'type'=>'tabs',
    'placement'=>'above', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'默认规则', 'content'=>$shaixuan, 'active'=>true),
        array('label'=>'指定小说', 'content'=>$paixu),
    ),
    'htmlOptions'=>array('style'=>'padding-left:100px;'),
));
?>

<div class="control-group" id="showInput">
    <label class="control-label">条数<span class="required">*</span></label>
    <div class='controls' id="articleList">
       <?php echo CHtml::textField('nums',isset($vars[3]) ? $vars[3] : '',array('id'=>'nums','style' => 'width:160px;'));?>
    </div>
</div>
<style>
.tags{width:250px;float:left;}
</style>
<?php
$templatetags = '';
foreach(Yii::app()->controller->module['templatetags'] as $k=>$v){
	$templatetags .= '<div class="tags">'.$k.$v.'</div>';
}
$templatetags .= '<div style="clear:both;"></div>'
?>
<?php echo $form->textAreaRow($model,'template',array('class'=>'span5','style'=>'width:500px;height:100px','hint'=>'{$block}代表区块内容<br />{$blockname}代表区块标题')); ?>
<?php echo $form->textAreaRow($model,'content',array('class'=>'span5','style'=>'width:500px;height:200px','hint'=>$templatetags)); ?>
<?php echo $form->textFieldRow($model, 'cachetime',array('hint'=>'根据设置的秒数自动更新数据')); ?>
<div class="form-actions">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'buttonType'=>'submit',
        'type'=>'primary',
        'label'=>'确定',
    )); ?>
</div>

<?php $this->endWidget(); ?>
