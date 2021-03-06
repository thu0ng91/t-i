<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
//    'homeLink' => CHtml::link(""
    'links'=>array(
        '小说管理' => Yii::app()->createUrl("book/admin/book/index"),
        '《' . (isset($book) ? $book->title : $model->book->title)  . '》章节管理',
))); ?>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'新建章节',
	'url' => Yii::app()->createUrl('book/admin/chapter/create', array("bookid" => $book->id)),
    'type'=>'primary', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
	'id'=>'chapter',
//    'filter' => $model,
    'columns'=>array(
array(
    'class' => 'CCheckBoxColumn',
    'selectableRows' => 2,
    'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
    'checkBoxHtmlOptions' => array('name' => 'id[]'), //name在js中会用到
),
array('name'=>'id', 'header' => '章节编号', 'filter' => false),
        array('name'=>'title', 'filter' => false ),
        array('name'=>'chapterorder','value' => '$row +  ($this->grid->dataProvider->getPagination()->getCurrentPage() * $this->grid->dataProvider->getPagination()->getPageSize()) + 1' ,'filter' => false ),
        array('name'=>'wordcount', 'filter' => false ),
//        array('name'=>'parentid', 'value' => '$data->parent->title', 'filter' => false),
//        array('name'=>'isnav',  'value' =>  '$data->isnav == 0 ? "否" : "是"', 'filter' => array('否', '是')),
//        array('name'=>'language', 'header'=>'Language'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{move}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
            'buttons' => array(
                'update' => array(
                    'label'=>'编辑章节',     // text label of the button
                    'url'=>'Yii::app()->createUrl("book/admin/chapter/update",array("id"=>$data->id, "bookid" => $data->bookid))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'delete' => array(
                    'label'=>'删除章节',     // text label of the button
                    'url'=>'Yii::app()->createUrl("book/admin/chapter/delete",array("id"=>$data->id, "bookid" => $data->bookid))',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
//                    'icon' => 'eye-open',
                    'options'=> array('style'=>'cursor:pointer;'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
                'move' => array(
                    'label'=>'移动章节',     // text label of the button
                    'url'=>'"#" .$data->id',       // a PHP expression for generating the URL of the button
                    'imageUrl'=> '',  // image URL of the button. If not set or false, a text link is used
                    'icon' => 'arrow-right',
                    'options'=> array('style'=>'cursor:pointer;', 'onclick' => 'showMoveDialog(this);'), // HTML options for the button tag
//                    'click'=> 'js:function(){}',     // a JS function to be invoked when the button is clicked
                    'visible'=> 'true',
                ),
            )
        ),
    ),
)); ?>

<script>
    function showMoveDialog(obj)
    {
        var bookId = '<?php echo $book->id;?>';
        var el = $(obj);
        var chapterId = el.attr("href").replace("#", "");
        var url = '<?php echo Yii::app()->createUrl("book/admin/chapter/move");?>';
//        art.dialog({content:chapterId});
        url += "/bookid/" + bookId + "/id/" + chapterId;
//        art.dialog.open(url, {title: '小说章节移动'});
        art.dialog.open(url, {
            title: '小说章节移动',
//            ok: function(topWin){
////                art.dialog('hello world');
//            },
//            close: function(){
//                art.dialog.tips('close')
//            }
            width: "60%"
        }, false);
    }
</script>
<script type="text/javascript">
    /*<![CDATA[*/
    var GetCheckbox = function (){
        var data=new Array();
        var bookId = '<?php echo $book->id;?>';
        $('input:checkbox[name="id[]"]').each(function (){
            //根据上边定义checkbox名字获取选中项，然后放到数组
            if($(this).attr("checked")=="checked"){
                data.push($(this).val());
            }
        });
        if(data.length > 0){
            $.post('<?php echo CHtml::normalizeUrl(array('/book/admin/chapter/delall/','id'=>$book->id)); ?>',{'id[]':data}, function (data) {
                var ret = $.parseJSON(data);
                if (ret != null && ret.success != null && ret.success) {
                    $.fn.yiiGridView.update('chapter'); //这里是CGridView中定义的id
                }
            });
        }else{
            alert("请选择要删除的关键字!");
        }
    }
    /*]]>*/
</script>