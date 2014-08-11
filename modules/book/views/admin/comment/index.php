<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - 评论管理';
?>
<ul class="nav nav-tabs">
  <li class="active">
    <a href="#">评论管理</a>
  </li>
</ul>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$dataProvider,
    'template'=>"{items}\n{pager}",
    'filter' => $model,
	'id'=>'comment',
    'columns'=>array(
array(
    'class' => 'CCheckBoxColumn',
    'selectableRows' => 2,
    'footer' => '<button type="button" onclick="GetCheckbox();" style="width:76px">批量删除</button>',
    'checkBoxHtmlOptions' => array('name' => 'id[]'), //name在js中会用到
),
        array('name'=>'id', 'header' => '编号','htmlOptions'=>array('style'=>'width:80px;')),
        array('name'=>'book_id', 'header' => '小说名称','value'=>'Book::getBookName($data->book_id)'),
        array('name'=>'username','header' => '评论用户' ),
        array('name'=>'content','header' => '评论内容' ),
        //array('name'=>'digest','header' => '精华','filter' => array('1'=>'是','0'=>'全部')),
        //array('name'=> 'recommends','header' => '推荐数','filter'=>false,'htmlOptions'=>array('style'=>'width:50px;')),
//        array('name'=>'language', 'header'=>'Language'),
        array('name'=>'dateline','header' => '发布时间', 'value' => 'date("Y-m-d H:i:s", $data->dateline)', 'filter' => false),
        array('name'=>'status','header' => '状态', 'value' => 'Yii::app()->params["statusLabel"][$data->status]', 'filter' => Yii::app()->params['statusAction']),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
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
            $.post('<?php echo CHtml::normalizeUrl(array('/book/admin/comment/delall/')); ?>',{'id[]':data}, function (data) {
                var ret = $.parseJSON(data);
                if (ret != null && ret.success != null && ret.success) {
                    $.fn.yiiGridView.update('comment'); //这里是CGridView中定义的id
                }
            });
        }else{
            alert("请选择要删除的关键字!");
        }
    }
    /*]]>*/
</script>