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


  <form class="form-horizontal" id="staticForm" action="<?php echo Yii::app()->createUrl('book/admin/static/update');?>" method="post" onsubmit="return false;">
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
        <input type="checkbox" name="type[]" value="1" checked>
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
            <button class="btn btn-success" data-loading-text="正在生成...">提交</button>
          </div>
     </div>
        <input type="hidden" name="bookid" id="bookid" value="0" />
  </form>
    <div class="control-group" id="msgDiv" style="display: none">
        <label class="control-label"></label>

        <!-- Button -->
        <div class="controls">
            <textarea class="" id="msgTextArea" style="width:500px;height:400px"></textarea>
        </div>
    </div>

    </fieldset>

<script>
    $(".btn-success").click(function () {
        $(".btn-success").button('loading');
        $("#staticForm").ajaxSubmit({
            dataType:  'json',
            error: function () {
                alert("生成失败！生成超时或生成出现错误！");
                $(".btn-success").button('reset');
                $("#msgDiv").hide();
                $("#msgTextArea").val("");
            },
            success: function (r) {
                if (!r.result) {
//                    alert(r.data.msg);
                    appendText(r.data.msg);
                    $(".btn-success").button('reset');
                    return;
                }

                if (r.data.nextId == 0) {
                    $("#bookid").val(0);
                    $(".btn-success").button('reset');
                    return;
                }

                $("#bookid").val(r.data.nextId);
                appendText(r.data.msg);

                $(".btn-success").click();
                //alert(r.status);
//                $(".btn-success").button('reset');
            }
        });

    })

    function appendText(text) {
        $("#msgDiv").show();
        var v = $("#msgTextArea").val();
        $("#msgTextArea").val(v + "\r\n" + text);
    }
//    $(".btn-success").button('loading');
</script>