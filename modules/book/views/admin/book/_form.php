<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'book-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    )); ?>

      <?php echo $form->textFieldRow($model, 'title'); ?>
    <?php echo $form->textFieldRow($model, 'pinyin', array(
        'hint'=> '提示：默认保持不填写，会根据填写小说名自动提取'
    )); ?>
    <?php echo $form->textFieldRow($model, 'initial', array(
        'hint'=> '提示：默认保持不填写，会根据填写小说名自动提取'
    )); ?>
    <?php echo $form->dropDownListRow($model, 'cid', $categorys); ?>
      <?php echo $form->textFieldRow($model, 'author'); ?>
    <?php echo $form->textFieldRow($model, 'keywords', array(
        'hint'=> '提示：逗号分隔'
    )); ?>
      <?php echo $form->dropDownListRow($model, 'flag', Yii::app()->params['novelFlag']); ?>
<!--      --><?php //echo $form->fileFieldRow($model, 'imagefile'); ?>

    <?php if ($this->action->id == 'update'):?>
        <div class="control-group ">
            <label for="Book_imagefile1" class="control-label">已上传封面图</label>
            <div class="controls">
                <?php foreach ($bookimages as $img):?>
                    <div>
                        <?php echo CHtml::image(H::getNovelImageUrl($img->imgurl));?><a href="<?php echo Yii::app()->createUrl('book/admin/deleteBookImage', array('id' => $img->id));?>" onclick="ajaxDeleteImage;return false;">删除</a>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif; ?>

    <div class="control-group ">
        <label for="Book_imagefile1" class="control-label">上传封面图</label>
        <div class="controls">
            <p class="help-block">提示：可上传多张，最多支持上传5张封面图</p>
            <?php
            $this->widget('CMultiFileUpload', array(
                'name' => 'images',
                'max' => 5,
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => '该文件已经选择', // useful, i think
                'denied' => '错误的文件格式', // useful, i think
            ));
            ?>
        </div>
    </div>

      <?php echo $form->textAreaRow($model, 'summary'); ?>


    <?php echo $form->dropDownListRow($model, 'recommendlevel', Yii::app()->params['recommendLevel']); ?>

      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

<script>
    function ajaxDeleteImage(url, obj)
    {
        $.post(url, function(r) {
            //alert(r);
            //window.location.reload();
            $(obj).parent().remove();
        });
    }
</script>