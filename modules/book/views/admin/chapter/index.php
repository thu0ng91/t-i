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
//    'filter' => $model,
    'columns'=>array(
//        array('name'=>'id', 'header'=>'#'),
        array('name'=>'id', 'header' => '#', 'filter' => false),
        array('name'=>'title', 'filter' => false ),
        array('name'=>'chapterorder', 'filter' => false ),
        array('name'=>'wordcount', 'filter' => false ),
//        array('name'=>'parentid', 'value' => '$data->parent->title', 'filter' => false),
//        array('name'=>'isnav',  'value' =>  '$data->isnav == 0 ? "否" : "是"', 'filter' => array('否', '是')),
//        array('name'=>'language', 'header'=>'Language'),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{delete}",
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
