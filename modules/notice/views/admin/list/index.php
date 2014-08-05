<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'新建公告',
    'url' => Yii::app()->createUrl('notice/admin/list/create'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    //'filter' => $model,
    'columns'=>array(
        array('name'=>'id', 'header' => 'ID','htmlOptions'=>array('style'=>'width: 80px;'), 'filter' => false),
        array('name'=>'title', 'header' => '公告标题', 'filter' => false),
        array('name'=>'views', 'header' => '查看数', 'filter' => false),
        array('name'=>'dateline', 'value' => 'date("Y-m-d H:i:s", $data->dateline)', 'filter' => false),
        array('name'=>'status', 'header' => '状态','htmlOptions'=>array('style'=>'width: 100px;'), 'value' => '$data->status==1?显示:隐藏', 'filter' => false),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
            'buttons' => array(
                'update' => array(
                    'label'=>'编辑公告',     // text label of the button
                    'url'=>'Yii::app()->createUrl("notice/admin/list/create",array("id"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'delete' => array(
                    'label'=>'删除公告',     // text label of the button
                    'url'=>'Yii::app()->createUrl("notice/admin/list/delete",array("id"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
            ),
        ),

    ),
)); ?>
