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
            'images' => array(CActiveRecord::HAS_MANY, 'BookImage', 'bookid'),
//            'chapter' => array(CActiveRecord::HAS_MANY, 'Article', 'bookid', 'order'=>'chapter.chapter ASC, chapter.id asc', 'on' => 'chapter.status=' . Yii::app()->params['status']['ischecked']),
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
            $title = str_replace(" ", "-", $this->title);
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
            $v = new Volume();
            if (!$v->exists('bookid=:bookid', array(
                ':bookid' => $this->id
            ))) {
                $v->bookid = $this->id;
                $v->title = "默认分卷";
                $v->save();
            }
        }
//        parent::afterSave();
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
}