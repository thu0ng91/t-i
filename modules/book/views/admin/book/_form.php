<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>
<!-- jQuery UI CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/jquery-ui.css" type="text/css" rel="stylesheet">
<!-- Bootstrap styling for Typeahead -->
<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/tokenfield-typeahead.min.css" type="text/css" rel="stylesheet">
<!-- Tokenfield CSS -->
<link href="<?php echo Yii::app()->theme->baseUrl;?>/css/bootstrap-tokenfield.min.css" type="text/css" rel="stylesheet">

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
<!--      --><?php //echo $form->fileFieldRow($model, 'imagefile'); ?>

    <?php if ($this->action->id == 'bookUpdate'):?>
        <div class="control-group ">
            <label for="Book_imagefile1" class="control-label">已上传封面图</label>
            <div class="controls">
                <?php foreach ($model->images as $img):?>
                    <p>
                        <?php echo CHtml::image(H::getNovelImageUrl($img->imgurl), '', array('width' => '100px', 'height' => '100px'));?><a href="<?php echo Yii::app()->createUrl('book/admin/deleteBookImage', array('id' => $img->id));?>" onclick="ajaxDeleteImage(this);return false;">删除</a>
                    </p>

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

    <div class="control-group ">
        <label for="Book_imagefile1" class="control-label">标签</label>
        <div class="tokenfield controls">
            <input type="hidden" name="book_tags" id="book_tags" value="" />
            <input type="text" class="form-control" id="tags-tokenfield-typeahead" placeholder="点击填写标签，按回车键保存" value="" />
        </div>
    </div>

      <?php echo $form->textAreaRow($model, 'summary'); ?>

    <?php echo $form->dropDownListRow($model, 'flag', Yii::app()->params['novelFlag']); ?>

    <?php echo $form->dropDownListRow($model, 'recommendlevel', Yii::app()->params['recommendLevel']); ?>

      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/typeahead.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/bootstrap-tokenfield.min.js"></script>

<script>
    var urls = {
      'ajaxCreateTag' : '<?php echo Yii::app()->createUrl("book/admin/ajaxCreateTag");?>'
    };
    function ajaxDeleteImage(obj)
    {
        var url = $(obj).attr("href");
        $.post(url, function(r) {
            //alert(r);
            //window.location.reload();
            $(obj).parent().remove();
        });
    }
    $('#tags-tokenfield-typeahead').tokenfield({
        typeahead: {
            name: 'tags',
            local: []
        }
    }).on('afterCreateToken', function (e) {
            //alert(e.token.value);
            $.post(urls.ajaxCreateTag, {tag: e.token.value}, function (data) {
                //alert(data.result);
                if (data.result) {
                    var v = $("#book_tags").val();
                    if (v != "") {
                        v += ",";
                    }
                    v += data.data;
                    $("#book_tags").val(v);
                }
            },'json');
        }).on('removeToken', function (e) {
//            alert(e.token.value);
        });

</script>