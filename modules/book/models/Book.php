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
 * @property integer $type
 * @property string $imgurl
 * @property string $summary
 * @property string $keywords
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
class Book extends CActiveRecord
{
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
			array('title', 'required'),
			array('authorid, cid, type, recommendlevel, favoritenum, chaptercount, wordcount, lastchapterid, lastchaptertime, alllikenum, monthlikenum, weeklikenum, daylikenum, lastliketime, allclicks, monthclicks, weekclicks, dayclicks, lastclicktime, hascover, createtime, updatetime, status', 'numerical', 'integerOnly'=>true),
			array('title, keywords, lastchaptertitle', 'length', 'max'=>100),
			array('author', 'length', 'max'=>32),
			array('imgurl, pinyin', 'length', 'max'=>200),
			array('summary', 'length', 'max'=>255),
			array('initial', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, author, authorid, cid, type, imgurl, summary, keywords, pinyin, initial, recommendlevel, favoritenum, chaptercount, wordcount, lastchapterid, lastchaptertitle, lastchaptertime, alllikenum, monthlikenum, weeklikenum, daylikenum, lastliketime, allclicks, monthclicks, weekclicks, dayclicks, lastclicktime, hascover, createtime, updatetime, status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'author' => 'Author',
			'authorid' => 'Authorid',
			'cid' => 'Cid',
			'type' => 'Type',
			'imgurl' => 'Imgurl',
			'summary' => 'Summary',
			'keywords' => 'Keywords',
			'pinyin' => 'Pinyin',
			'initial' => 'Initial',
			'recommendlevel' => 'Recommendlevel',
			'favoritenum' => 'Favoritenum',
			'chaptercount' => 'Chaptercount',
			'wordcount' => 'Wordcount',
			'lastchapterid' => 'Lastchapterid',
			'lastchaptertitle' => 'Lastchaptertitle',
			'lastchaptertime' => 'Lastchaptertime',
			'alllikenum' => 'Alllikenum',
			'monthlikenum' => 'Monthlikenum',
			'weeklikenum' => 'Weeklikenum',
			'daylikenum' => 'Daylikenum',
			'lastliketime' => 'Lastliketime',
			'allclicks' => 'Allclicks',
			'monthclicks' => 'Monthclicks',
			'weekclicks' => 'Weekclicks',
			'dayclicks' => 'Dayclicks',
			'lastclicktime' => 'Lastclicktime',
			'hascover' => 'Hascover',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
			'status' => 'Status',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('keywords',$this->keywords,true);
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
}