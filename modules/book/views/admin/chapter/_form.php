<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
//);
?>
<style type="text/css">

</style>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '小说管理' => Yii::app()->createUrl("book/admin/book/index"),
        "《" . (isset($book) ? $book->title : $book->title)  . '》章节管理' => Yii::app()->createUrl("book/admin/chapter/index", array("bookid" => isset($book) ? $book->id : $book->id)),
        $this->action->id == 'create' ? "新建章节" : "编辑章节",
    ),
)); ?>

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'category-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
    )); ?>

    <div class="control-group ">
        <label for="Article_book" class="control-label">所属小说</label>
        <div class="controls">
            <?php if ($this->action->id == 'create'): ?>
                <?php $this->widget('bootstrap.widgets.TbLabel', array(
                    'type'=> 'success', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label'=> $book->title,
                )); ?>
            <?php else: ?>
                <?php $this->widget('bootstrap.widgets.TbLabel', array(
                    'type'=>'success', // 'success', 'warning', 'important', 'info' or 'inverse'
                    'label'=> $book->title,
                )); ?>
            <?php endif; ?>
        </div>
    </div>

      <?php echo $form->textFieldRow($model, 'title'); ?>

<!--        --><?php //echo $form->dropDownListRow($model, 'parentid', $categorys); ?>

<!--        --><?php //echo $form->textFieldRow($model, 'shorttitle', array('hint' => '不填写则自动获取栏目名称的拼音')); ?>

        <?php echo $form->dropDownListRow($model, 'volumeid', $volumes); ?>
        <?php echo $form->dropDownListRow($model, 'contenttype', Yii::app()->params['novelContentType']); ?>
        <?php echo $form->textAreaRow($model, 'content', array(
            'style' => 'width:80%;height:300px',
            'hint'=> ' '
        )); ?>

<!--        --><?php //echo $form->textFieldRow($model, 'sort', array(
//            'hint'=> '提示：数值越大越靠前'
//        )); ?>

<!--        <fieldset class="well the-fieldset">-->
<!--            <legend class="the-legend">分类 SEO 设置</legend>-->
<!--            --><?php //echo $form->textFieldRow($model, 'seotitle'); ?>
<!--            --><?php //echo $form->textFieldRow($model, 'keywords'); ?>
<!--            --><?php //echo $form->textAreaRow($model, 'description'); ?>
<!--        </fieldset>-->

      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

<script>
    $(function () {
        setWordCount();
        $("#Chapter_content").bind('input propertychange', function () {
            setWordCount();
        });
    });
//    document.onkeydown=function(){
//        setWordCount();
//    }

    function setWordCount()
    {
        var len  = $("#Chapter_content").val().length;
        $("#Chapter_content").parent().find(".help-block").html("总字数：" + len + "");
    }
</script>