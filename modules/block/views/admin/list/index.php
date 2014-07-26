<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'新建区块',
    'url' => Yii::app()->createUrl('block/admin/list/create'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'filter' => $model,
    'columns'=>array(
//        array('name'=>'id', 'header'=>'#'),
//        array(
////            'selectableRows' => 0,
//            'header' => '<input type="checkbox" /> 全选',
////            'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
//            'class' => 'CCheckBoxColumn',
//            'headerHtmlOptions' => array('width'=>'33px'),
//            'checkBoxHtmlOptions' => array('name' => 'selectdel[]'),
//        ),
        array('name'=>'bid', 'header' => '模块编号', 'filter' => false),
//        array('name'=>'username', ),
//        array(
//            'name'=>'imgurl',
//            'type' => 'html',
//            'value' => 'CHtml::image(H::getNovelImageUrl($data->imgurl), "", array("style"=>"width: 50px;height:50px"))',
//            'htmlOptions'=>array('style'=>'width: 20px;height:20px'),
//             'filter' => false
//        ),
        array('name'=>'blockname', 'filter' => false),
//        array('name'=>'cid', 'value' => '$data->category->title', 'filter' => $categorys),
//        array('name'=>'volumecount', 'value' => '$data->volumecount', 'filter' => false),
////        array('name'=>'chaptercount', 'value' => '$data->chaptercount', 'filter' => false),
//        array('name'=>'chaptercount', 'value' => '$data->chaptercount', 'filter' => false),
//        array('name'=>'wordcount', 'value' => '$data->wordcount', 'filter' => false),
//        array('name'=> 'recommendlevel', 'value' => 'Yii::app()->params["recommendLevel"][$data->recommendlevel]', 'filter' => Yii::app()->params["recommendLevel"]),
////        array('name'=>'language', 'header'=>'Language'),
//        array('name'=>'createtime', 'value' => 'date("Y-m-d H:i:s", $data->createtime)', 'filter' => false),
//        array('name'=>'lastlogintime', 'value' => '$data->lastlogintime != null ? date("Y-m-d H:i:s", $data->lastlogintime) : ""', 'filter' => false),
//        array('name'=>'loginhits', 'filter'=>false),
//        array('name'=>'status', 'value' => 'Yii::app()->params["statusLabel"][$data->status]', 'filter' => Yii::app()->params['statusAction']),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
            'buttons' => array(
                'update' => array(
                    'label'=>'编辑区块',     // text label of the button
                    'url'=>'Yii::app()->createUrl("block/admin/list/update",array("id"=>$data->bid))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'delete' => array(
                    'label'=>'删除区块',     // text label of the button
                    'url'=>'Yii::app()->createUrl("block/admin/list/delete",array("id"=>$data->bid))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
//                'volume' => array(
//                    'label'=>'管理小说分卷',     // text label of the button
//                    'url'=>'Yii::app()->createUrl("list/admin/volume/index",array("listid"=>$data->bid))',       // a PHP expression for generating the URL of the button
//                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'list',
//                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
//                    'visible'=> 'true',
//                ),
//                'chapter' => array(
//                    'label'=>'管理小说章节',     // text label of the button
//                    'url'=>'Yii::app()->createUrl("list/admin/chapter/index",array("listid"=>$data->bid))',       // a PHP expression for generating the URL of the button
//                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'list',
//                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
//                    'visible'=> 'true',
//                ),
            ),
        ),

    ),
)); ?>
