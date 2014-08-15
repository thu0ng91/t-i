<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说连载模块伪静态设置';
?>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">伪静态设置</a>
  </li>
</ul>
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'rewriteconfig-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
//      'htmlOptions'=>array('class'=>'well'),
      'htmlOptions'=>array('enctype' => 'multipart/form-data'),
    )); ?>

<!--      --><?php //echo $form->dropDownListRow($model, 'UrlSuffix', CMap::mergeArray(array('-1' => '请选择'), Yii::app()->params['urlSuffix'])); ?>
      <?php echo $form->textFieldRow($model, 'BookCategoryRule', array(
          'hint'=> "可用变量：<br /> {pinyin}表示分类拼音 <br /> 示例：<br /> category/{pinyin} <br /> fenlei/{pinyin}"
      )); ?>
      <?php echo $form->textFieldRow($model, 'BookInfoRule', array(
          'hint'=> "可用变量：<br /> {id}表示小说编号 <br />示例：<br /> book/info/{id} <br /> novel/info/{id}"
      )); ?>

    <?php echo $form->textFieldRow($model, 'BookIndexRule', array(
        'hint'=> "可用变量：<br /> {id}表示小说编号；{dir} 表示小说编号除以1000取整；{pinyin}表示小说标题拼音 <br />示例：<br /> book/index/{id} <br /> novel/index/{id}"
    )); ?>

    <?php echo $form->checkBoxRow($model, 'BookIndexRuleIsUseVarDir', array(
        'hint'=> ""
    )); ?>

    <?php echo $form->checkBoxRow($model, 'BookIndexRuleIsUseVarPinyin', array(
        'hint'=> "<b style='color:#ff0000'>注意：<br /> 1. 请勿随意开启，需要模板中{novel_book_link}标签启用拼音化【默认模板未启用】 <br /> 2. {pinyin}和{id}变量不要同时填写在重写规则中</b>"
    )); ?>

      <?php echo $form->textFieldRow($model, 'BookChapterDetailRule', array(
          'hint'=> "可用变量：<br /> {bookid}表示小说编号；{dir} 表示小说编号除以1000取整；{pinyin} 表示小说标题拼音；{id}，表示小说章节编号 <br />示例：<br /> {bookid}/chapter/{id} <br /> {bookid}/zhangjie/{id}"
      )); ?>

    <?php echo $form->checkBoxRow($model, 'BookChapterDetailRuleVarDir', array(
        'hint'=> ""
    )); ?>

    <?php echo $form->checkBoxRow($model, 'BookChapterDetailRuleVarPinyin', array(
        'hint'=> "<b style='color:#ff0000'>注意：<br /> 1. 请勿随意开启，需要模板中{novel_chapter_link}标签启用拼音化【默认模板未启用】 <br /> 2. {pinyin}和{bookid}变量不要同时填写在重写规则中</b>"
    )); ?>

    <?php echo $form->textFieldRow($model, 'BookSearchRule', array(
        'hint'=> "可用变量：<br /> 无"
    )); ?>

    <?php echo $form->textFieldRow($model, 'BookLastupdateRule', array(
        'hint'=> "可用变量：<br /> 无"
    )); ?>

    <?php echo $form->textFieldRow($model, 'BookRankRule', array(
        'hint'=> "可用变量：<br /> 无"
    )); ?>
<!--      --><?php //echo $form->textFieldRow($model, 'SiteAttachmentPath'); ?>
<!--      --><?php //echo $form->textAreaRow($model, 'SiteCopyright'); ?>


      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'确定',
            )); ?>
      </div>

    <?php $this->endWidget(); ?>

