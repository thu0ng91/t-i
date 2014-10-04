<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说重新生成';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '小说管理' => Yii::app()->createUrl("book/admin/book/index"),
        '重新生成',
    ),
)); ?>


  <form class="form-horizontal" action="<?php echo Yii::app()->createUrl('book/admin/update/update');?>" method="post">
    <fieldset>
      <div id="legend" class="">
        <legend class="">重新生成</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">开始ID<span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="beginid" placeholder="小说开始ID" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">结束ID<span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="endid" placeholder="小说结束ID" class="input-xlarge">
            <p class="help-block"></p>
          </div>
        </div>

    

    

    <div class="control-group">
          <label class="control-label">选择生成选项<span class="required">*</span></label>

          <!-- Multiple Checkboxes -->
          <div class="controls">
      <!-- Inline Checkboxes -->
      <label class="checkbox inline">
        <input type="checkbox" name="type[]" value="1">
        生成目录页
      </label>
      <label class="checkbox inline">
        <input type="checkbox" name="type[]" value="2">
        生成章节页
      </label>
  </div>

        </div>

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success">提交</button>
          </div>
        </div>

    </fieldset>
  </form>
