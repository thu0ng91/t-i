<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '区块管理' => Yii::app()->createUrl("block/admin/list/index"),
        '导入区块数据',
    ),
)); ?>
<form class="form-horizontal" action="<?php echo Yii::app()->createUrl("block/admin/list/insert");?>" enctype="multipart/form-data" method="post">
    <fieldset>
      <div id="legend" class="">
        <legend class="">导入区块数据</legend>
      </div>
    

    

    <div class="control-group">
          <label class="control-label"></label>

          <!-- File Upload -->
          <div class="controls">
            <input class="input-file" id="fileInput" type="file" name="insertdata" value="">
          </div>
        </div>

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button class="btn btn-success">确定导入</button>
          </div>
        </div>

    </fieldset>
  </form>