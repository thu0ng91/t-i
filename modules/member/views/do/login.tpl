
    <div class="form form-signin">
    {*<?php $this->renderPartial('//layouts/flash-message'); ?>*}
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
      'id'=>'login-form',
      'type'=>'horizontal',
      'enableClientValidation'=>true,
      'clientOptions'=>array(
        'validateOnSubmit'=>true,
      ),
    )); ?>
        <fieldset class="well the-fieldset">
            <legend class="the-legend"><b>管理员登陆</b></legend>
      <?php echo $form->textFieldRow($model,'username'); ?>

      <?php echo $form->passwordFieldRow($model,'password',array(
            'hint'=>' ',
        )); ?>

      <?php // echo $form->checkBoxRow($model,'rememberMe'); ?>

      <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'primary',
                'label'=>'登陆',
            )); ?>
      </div>
    </fieldset>
    <?php $this->endWidget(); ?>

    </div><!-- form -->
