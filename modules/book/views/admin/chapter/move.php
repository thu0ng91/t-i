<form action="<?php echo Yii::app()->createUrl('book/admin/chapter/move', array('bookid' => $chapter->bookid, 'id' => $chapter->id)) ?>" method="post">
    <p>移动章节 《<?php echo $chapter->title;?>》 到：</p>
    <hr />
    <table width="100%">
        <?php foreach ($chapterList as $k => $v):?>
            <?php if ($k % 4 == 0):?>
        <tr>
            <?php endif;?>

            <td><input type="radio" name="select_chapter_id" value="<?php echo $v->id;?>" <?php if ($v->id == $chapter->id):?>disabled="true"<?php endif;?> /><?php echo $v->title;?></td>

            <?php if (($k + 1) % 4 == 0):?>
         </tr>
            <?php endif;?>
        <?php endforeach; ?>
    </table>
    <hr />
    <select name="pos">
        <option value="before">之前</option>
        <option value="after">之后</option>
    </select>
    <br />
    <input type="submit" value="确定" />
</form>