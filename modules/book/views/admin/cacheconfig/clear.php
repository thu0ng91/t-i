<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - 小说连载模块缓存清除';
?>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">缓存清除</a>
  </li>
</ul>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'cacheconfig-clear-form',
    'type'=>'horizontal',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
//      'htmlOptions'=>array('class'=>'well'),
//    'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

<div class="control-group ">
    <label class="control-label" for="">分类页缓存</label>
    <div class="controls">
        <input name="category_title" id="category_title" value="请输入分类拼音" type="text">
        <button class="btn btn-primary" type="button" onclick="doClear('category')">清除</button>
<!--        <span class="help-inline error" id="" style="display: none"></span>-->
    </div>
</div>


<div class="control-group ">
    <label class="control-label" for="">目录页缓存</label>
    <div class="controls">
        <input name="book_id" id="book_id" value="请输入小说ID" type="text">
        <button class="btn btn-primary" type="button" onclick="doClear('book')">清除</button>
        <!--        <span class="help-inline error" id="" style="display: none"></span>-->
    </div>
</div>

<div class="control-group ">
    <label class="control-label" for="">章节页缓存</label>
    <div class="controls">
        <input name="book_book_id" id="book_book_id" value="请输入小说ID" type="text">
        <input name="book_chapter_id" id="book_chapter_id" value="请输入小说章节ID" type="text">
        <button class="btn btn-primary" type="button" onclick="doClear('chapter')">清除</button>
        <!--        <span class="help-inline error" id="" style="display: none"></span>-->
    </div>
</div>

    <div class="control-group ">
        <label class="control-label" for="">排行页缓存</label>
        <div class="controls">
            <button class="btn btn-primary" type="button" onclick="doClear('rank')">清除</button>
            <!--        <span class="help-inline error" id="" style="display: none"></span>-->
        </div>
    </div>

    <div class="control-group ">
        <label class="control-label" for="">最近更新页缓存</label>
        <div class="controls">
            <button class="btn btn-primary" type="button" onclick="doClear('lastupdate')">清除</button>
            <!--        <span class="help-inline error" id="" style="display: none"></span>-->
        </div>
    </div>
<?php $this->endWidget(); ?>
<script>
    function doClear(type)
    {
        var url = '<?php echo Yii::app()->createUrl("book/admin/cacheconfig/doClear");?>' + "?type=" + type;
        var dataOpts = [];
        switch (type) {
            case 'category':
                dataOpts = {title:  $("#category_title").val()};
                break;
            case 'book':
                dataOpts = {bookid:  $("#book_id").val()};
                break;
            case 'chapter':
                dataOpts = {bookid:  $("#book_book_id").val(), chapterid: $("#book_chapter_id").val()};
                break;
//            case 'rank':
//            case 'lsatupdate':
//                break;
        }

        $.post(url, dataOpts, function(r) {
            if (r.result) {
                alert("清除成功！");
            }
        }, 'json');
    }
</script>