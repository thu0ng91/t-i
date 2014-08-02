<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'新建小说',
    'url' => Yii::app()->createUrl('book/admin/book/create'),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'filter' => $model,
	'id'=>'book',
    'columns'=>array(
array(
    'class' => 'CCheckBoxColumn',
    'selectableRows' => 2,
    'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
    'checkBoxHtmlOptions' => array('name' => 'id[]'), //name在js中会用到
),
        array('name'=>'id', 'header' => '小说编号', 'filter' => false),
        array('name'=>'title', ),
//        array(
//            'name'=>'imgurl',
//            'type' => 'html',
//            'value' => 'CHtml::image(H::getNovelImageUrl($data->imgurl), "", array("style"=>"width: 50px;height:50px"))',
//            'htmlOptions'=>array('style'=>'width: 20px;height:20px'),
//             'filter' => false
//        ),
        array('name'=>'author', ),
        array('name'=>'cid', 'value' => '$data->category->title', 'filter' => $categorys),
        array('name'=>'volumecount', 'value' => '$data->volumecount', 'filter' => false),
//        array('name'=>'chaptercount', 'value' => '$data->chaptercount', 'filter' => false),
        array('name'=>'chaptercount', 'value' => '$data->chaptercount', 'filter' => false),
        array('name'=>'wordcount', 'value' => '$data->wordcount', 'filter' => false),
        array('name'=> 'recommendlevel', 'value' => 'Yii::app()->params["recommendLevel"][$data->recommendlevel]', 'filter' => Yii::app()->params["recommendLevel"]),
//        array('name'=>'language', 'header'=>'Language'),
        array('name'=>'createtime', 'value' => 'date("Y-m-d H:i:s", $data->createtime)', 'filter' => false),
        array('name'=>'status', 'value' => 'Yii::app()->params["statusLabel"][$data->status]', 'filter' => Yii::app()->params['statusAction']),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{volume}{chapter}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
            'buttons' => array(
                'update' => array(
                    'label'=>'编辑小说',     // text label of the button
                    'url'=>'Yii::app()->createUrl("book/admin/book/update",array("id"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'volume' => array(
                    'label'=>'管理小说分卷',     // text label of the button
                    'url'=>'Yii::app()->createUrl("book/admin/volume/index",array("bookid"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
                    'icon' => 'book',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'chapter' => array(
                    'label'=>'管理小说章节',     // text label of the button
                    'url'=>'Yii::app()->createUrl("book/admin/chapter/index",array("bookid"=>$data->id))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
                    'icon' => 'list',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
            ),
        ),

    ),
)); ?>
<script type="text/javascript">
    /*<![CDATA[*/
    var GetCheckbox = function (){
        var data=new Array();
        $('input:checkbox[name="id[]"]').each(function (){
            //根据上边定义checkbox名字获取选中项，然后放到数组
            if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('<?php echo CHtml::normalizeUrl(array('/book/admin/book/delall/')); ?>',{'id[]':data}, function (data) {
                var ret = $.parseJSON(data);
                if (ret != null && ret.success != null && ret.success) {
                    $.fn.yiiGridView.update('book'); //这里是CGridView中定义的id
                }
            });
        }else{
            alert("请选择要删除的关键字!");
        }
    }
    /*]]>*/
</script>