<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'新建友链',
    'url' => Yii::app()->createUrl('friendlink/admin/list/create'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'filter' => $model,
    'columns'=>array(
        array('name'=>'id', 'header' => '区块ID','htmlOptions'=>array('style'=>'width: 80px;')),
//        array('name'=>'username', ),
//        array(
//            'name'=>'imgurl',
//            'type' => 'html',
//            'value' => 'CHtml::image(H::getNovelImageUrl($data->imgurl), "", array("style"=>"width: 50px;height:50px"))',
//            'htmlOptions'=>array('style'=>'width: 20px;height:20px'),
//             'filter' => false
//        ),
        array('name'=>'name', 'header' => '网站名称'),
        array('name'=>'logo', 'header' => 'LOGO','type'=>'image', 'filter' => false, 'value' => 'Friendlink::getLinkLogo($data->logo)'),
        array('name'=>'type', 'header' => '链接类型', 'filter' => false, 'value' => '$data->type==1?图片:文字'),
        array('name'=>'sequence', 'header' => '排序','htmlOptions'=>array('style'=>'width: 80px;')),
        array('name'=>'status', 'header' => '友链状态','htmlOptions'=>array('style'=>'width: 100px;'), 'value' => '$data->status==1?显示:隐藏', 'filter' => Yii::app()->params['blockstatus']),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
            'buttons' => array(
                'update' => array(
                    'label'=>'编辑友链',     // text label of the button
                    'url'=>'Yii::app()->createUrl("friendlink/admin/list/create",array("id"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'delete' => array(
                    'label'=>'删除友链',     // text label of the button
                    'url'=>'Yii::app()->createUrl("friendlink/admin/list/delete",array("id"=>$data->id))',       // a PHP expression for generating the URL of the button
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
