<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说最新章节修复';
//$this->breadcrumbs=array(
//	'Login',
//);
?>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '小说管理' => Yii::app()->createUrl("book/admin/book/index"),
        '最新章节修复',
    ),
)); ?>


  <form class="form-horizontal" id="fixForm" action="<?php echo Yii::app()->createUrl('book/admin/fix/fixlastchapter');?>" method="post" onsubmit="return false;">
    <fieldset>
      <div id="legend" class="">
        <legend class="">最新章节修复</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">问题小说编号列表<span class="required">*</span></label>
          <div class="controls">
            <input type="text" name="bookIdList" placeholder="如：1,3,5" class="input-xlarge">
            <p class="help-block">请从『小说管理』菜单中找到问题小说编号，多本小说请以英文逗号分隔</p>
          </div>
        </div>
  

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success" data-loading-text="正在修复...">提交</button>
          </div>
     </div>
        <!-- <input type="hidden" name="bookid" id="bookid" value="0" /> -->
    </fieldset>
  </form>


<script>
    $(".btn-success").click(function () {
        $(".btn-success").button('loading');
        $("#fixForm").ajaxSubmit({
            dataType:  'json',
            error: function () {
                alert("修复失败！修复超时或修复出现错误！");
                $(".btn-success").button('reset');
//                $("#msgDiv").hide();
//                $("#msgTextArea").val("");
            },
            success: function (r) {
                if (!r.result) {
//                    alert(r.data.msg);
//                    appendText(r.data.msg);
                    alert(r.data.msg);
                } else{
                    alert("修复问题小说最新章节成功！");
                }
                $(".btn-success").button('reset');
                return;
                //alert(r.status);
//                $(".btn-success").button('reset');
            }
        });

    });
//    $(".btn-success").button('loading');
</script>