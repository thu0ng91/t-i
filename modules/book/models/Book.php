<?php

/**
 * This is the model class for table "book".
 *
 * The followings are the available columns in table 'book':
 * @property string $id
 * @property string $title
 * @property string $author
 * @property integer $authorid
 * @property integer $cid
 * @property integer $flag
 * @property string $imgurl
 * @property string $keywords
 * @property string $summary
 * @property string $pinyin
 * @property string $initial
 * @property integer $recommendlevel
 * @property integer $favoritenum
 * @property integer $chaptercount
 * @property integer $wordcount
 * @property integer $lastchapterid
 * @property string $lastchaptertitle
 * @property integer $lastchaptertime
 * @property integer $alllikenum
 * @property integer $monthlikenum
 * @property integer $weeklikenum
 * @property integer $daylikenum
 * @property integer $lastliketime
 * @property integer $allclicks
 * @property integer $monthclicks
 * @property integer $weekclicks
 * @property integer $dayclicks
 * @property integer $lastclicktime
 * @property integer $hascover
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $status
 */
class Book extends BaseModel
{
    public $imagefile;

    public $coverImageUrl;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title,cid', 'required'),
			array('authorid, cid, flag, recommendlevel, favoritenum, chaptercount, wordcount, lastchapterid, lastchaptertime, alllikenum, monthlikenum, weeklikenum, daylikenum, lastliketime, allclicks, monthclicks, weekclicks, dayclicks, lastclicktime, hascover, createtime, updatetime, status', 'numerical', 'integerOnly'=>true),
			array('title, lastchaptertitle', 'length', 'max'=>100),
			array('author', 'length', 'max'=>32),
			array('pinyin', 'length', 'max'=>200),
			array('keywords', 'length', 'max'=>255),
			array('summary', 'length', 'max'=>1000),
			array('initial', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, author, authorid, cid, flag, imgurl, keywords, summary, pinyin, initial, recommendlevel, favoritenum, chaptercount, wordcount, lastchapterid, lastchaptertitle, lastchaptertime, alllikenum, monthlikenum, weeklikenum, daylikenum, lastliketime, allclicks, monthclicks, weekclicks, dayclicks, lastclicktime, hascover, createtime, updatetime, status', 'safe', 'on'=>'search'),
		);
	}

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'category' => array(CActiveRecord::BELONGS_TO, 'Category', 'cid'),
            'images' => array(CActiveRecord::HAS_MANY, 'BookImage', 'bookid', 'order' => 'images.createtime desc', 'on' => 'images.iscover=1'),
//            'chapter' => array(CActiveRecord::HAS_MANY, 'Chapter', 'bookid', 'order'=>'chapter.chapterorder ASC, chapter.id asc'),
        );
    }


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => '小说名',
			'author' => '作者',
			'authorid' => '作者编号',
			'cid' => '分类',
			'flag' => '写作阶段',
			'imagefile' => '封面图',
			'keywords' => '关键字',
//			'tags' => '标签',
			'summary' => '简介',
			'pinyin' => '小说名拼音',
			'initial' => '小说名首字母',
			'recommendlevel' => '推荐等级',
			'favoritenum' => '收藏数',
			'chaptercount' => '章节数',
			'volumecount' => '分卷数',
			'wordcount' => '总字数',
			'lastchapterid' => '最后章节编号',
			'lastchaptertitle' => '最后章节标题',
			'lastchaptertime' => '最后章节时间',
			'alllikenum' => '所有推荐数',
			'monthlikenum' => '月推荐数',
			'weeklikenum' => '周推荐数',
			'daylikenum' => '日推荐数',
			'lastliketime' => '最后推荐时间',
			'allclicks' => '所有点击数',
			'monthclicks' => '月点击数',
			'weekclicks' => '周点击数',
			'dayclicks' => '日点击数',
			'lastclicktime' => '最后点击时间',
			'hascover' => '是否有封面图',
			'createtime' => '发布时间',
			'updatetime' => '更新时间',
			'status' => '状态',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('authorid',$this->authorid);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('flag',$this->flag);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('pinyin',$this->pinyin,true);
		$criteria->compare('initial',$this->initial,true);
		$criteria->compare('recommendlevel',$this->recommendlevel);
		$criteria->compare('favoritenum',$this->favoritenum);
		$criteria->compare('chaptercount',$this->chaptercount);
		$criteria->compare('wordcount',$this->wordcount);
		$criteria->compare('lastchapterid',$this->lastchapterid);
		$criteria->compare('lastchaptertitle',$this->lastchaptertitle,true);
		$criteria->compare('lastchaptertime',$this->lastchaptertime);
		$criteria->compare('alllikenum',$this->alllikenum);
		$criteria->compare('monthlikenum',$this->monthlikenum);
		$criteria->compare('weeklikenum',$this->weeklikenum);
		$criteria->compare('daylikenum',$this->daylikenum);
		$criteria->compare('lastliketime',$this->lastliketime);
		$criteria->compare('allclicks',$this->allclicks);
		$criteria->compare('monthclicks',$this->monthclicks);
		$criteria->compare('weekclicks',$this->weekclicks);
		$criteria->compare('dayclicks',$this->dayclicks);
		$criteria->compare('lastclicktime',$this->lastclicktime);
		$criteria->compare('hascover',$this->hascover);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('updatetime',$this->updatetime);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    /**
     * @return bool|void
     */
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if (!$this->isNewRecord) return true;

            $title = trim($this->title);
            $this->title = $title;
//            $title = str_replace(" ", "-", $title);
            $this->pinyin = H::getPinYin($title);
            $m = self::model()->find("pinyin=:pinyin", array(
               ':pinyin' => $this->pinyin,
            ));
            // 粗略解决拼音相同的问题
            if ($m) {
                $this->pinyin = $this->pinyin . rand(1, 10000);
            }
            $this->initial = $this->pinyin{0};
            return true;
        } else return false;
    }

    public function afterSave()
    {
        if ($this->isNewRecord) { // 创建默认分卷
//            $v = new Volume();
//            if (!$v->exists('bookid=:bookid', array(
//                ':bookid' => $this->id
//            ))) {
//                $v->bookid = $this->id;
//                $v->title = "默认分卷";
//                $v->save();
//            }
            // 拷贝章节数据库
            $this->copyChapterDatabase($this->id);
        }
//        parent::afterSave();
    }

    public function afterFind()
    {
        if (count($this->images) > 0 && $this->hascover) {
            $this->coverImageUrl = H::getNovelImageUrl($this->images[0]->imgurl);
        } else {
            $this->coverImageUrl = Yii::app()->theme->baseUrl . "/images/nocover.jpg";
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            // 删除章节和分卷，注意有顺序
//            Chapter::customModel($this->id)->deleteAll('bookid=:bookid', array(
//                ':bookid' => $this->id,
//            ));

            // 删除小说时，清除章节数据
            $chapterDataDir = FW_TXT_DIR . DS . ($this->id % 500) . DS . $this->id;
            if (is_dir($chapterDataDir)) H::rrmdir($chapterDataDir);

//            Volume::model()->deleteAll('bookid=:bookid', array(
//                ':bookid' => $this->id,
//            ));
            // 删除关联tags
            BookTags::model()->deleteAll('bookid=:bookid', array(
                ':bookid' => $this->id,
            ));
            return true;
        } else return false;
    }

    /**
     * 获取书籍关联tags
     */
    public function getTags()
    {
        $sql = "select tags.id, tags.name from tags, book_tags where book_tags.tagid=tags.id and book_tags.bookid=:bookid";
        $list = Yii::app()->db->createCommand($sql)->queryAll(true, array(
            ':bookid' => $this->id,
        ));
        return $list;
    }

    /**
     * 统计小说点击：日、周、月、总点击
     * @param int $bookid
     * @return bool
     */
    public function updateClickStats($bookid = 0)
    {
        if ($bookid == 0) $bookid = $this->id;

        if ($bookid < 1) return false;

        $book = null;
        if ($bookid == $this->id) $book = $this;
        else {
            $book = self::model()->findByPk($bookid);
            if (!$book) return false;
        }

        $y = date('Y');
        $m = date('n');
        $d = date('Y-m-d');
        $w = date('W');

        $monthclicks = $book->monthclicks;
        $weekclicks = $book->weekclicks;
        $dayclicks = $book->dayclicks;

        if (date('n', $book->lastclicktime) == $m && $y == date('Y', $book->lastclicktime)) {
            $monthclicks += 1;
        } else {
            $monthclicks = 1;
        }

        if (date('W', $book->lastclicktime) == $w && $y == date('Y', $book->lastclicktime)) {
            $weekclicks += 1;
        } else {
            $weekclicks = 1;
        }

        if (date('Y-m-d', $book->lastclicktime) == $d) {
            $dayclicks += 1;
        } else {
            $dayclicks = 1;
        }

//        $book->updateCounters(
//            array(
//                'monthclicks' => $monthclicks,
//                'weekclicks' => $weekclicks,
//                'dayclicks' => $dayclicks,
//            ),
//            'id=:id',
//            array(
//                ':id' => $bookid,
//            )
//        );

        $book->monthclicks = $monthclicks;
        $book->weekclicks = $weekclicks;
        $book->dayclicks = $dayclicks;
        $book->allclicks += 1;
        $book->lastclicktime = time();
        $book->update(array(
            'lastclicktime',
            'monthclicks',
            'weekclicks',
            'dayclicks',
            'allclicks',
        ));
    }

    /**
     * 复制章节数据库到小说章节保存目录
     * @param $bookId
     * @return bool
     */
    protected function copyChapterDatabase($bookId)
    {
        $srcPath = FW_MODULE_BASE_PATH . DS . "book" . DS . "data" . DS . "chapter.db";
//        $destPath = FW_TXT_DIR . DS . ($bookId % 500) . DS  . $bookId;
        $destPath = self::getBookDataDir($bookId);

        if (!is_dir($destPath)) @mkdir($destPath, 0777, true);

        $destPath .= DS . "chapter.db";
        return @copy($srcPath, $destPath);
    }

    /**
     * 返回书籍数据目录
     * @param $bookId
     * @return bool|string
     */
    public static function getBookDataDir($bookId)
    {
        if ($bookId > 0) {
            $dir = FW_ROOT_PATH . DS . FW_TXT_DIR;
            $dir .= DS . ($bookId % 500) . DS . $bookId;

            return $dir;
        }

        return false;
    }
}