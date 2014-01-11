<?php

/**
 * This is the model class for table "volume".
 *
 * The followings are the available columns in table 'volume':
 * @property string $id
 * @property integer $bookid
 * @property string $title
 * @property integer $chaptercount
 * @property integer $wordcount
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $sort
 */
class Volume extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Volume the static model class
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
		return 'volume';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('bookid,title', 'required'),
			array('bookid, chaptercount, wordcount, createtime, sort', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bookid, title, chaptercount, wordcount, createtime, sort', 'safe', 'on'=>'search'),
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
            'book' => array(CActiveRecord::BELONGS_TO, 'Book', 'bookid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bookid' => '小说编号',
			'title' => '标题',
			'chaptercount' => '分卷章节数',
			'createtime' => '发布时间',
			'sort' => '排序号',
		);
	}


    /**
     * @return bool
     */
    public function beforeSave()
    {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                // 追加发布时间
                $this->createtime = time();
            }
            return true;
        } else return false;
    }

    public function afterSave()
    {
        $book = Book::model()->findByPk($this->bookid);
        if (!$book) return false;

        $book->updateCounters(
            array(
                'volumecount' => 1,
            ),
            'id=:id',
            array(
                ':id' => $this->bookid,
            )
        );
    }


    public function afterDelete()
    {
        // 修改小说分卷数
        $book = new Book();
        $book->updateCounters(
            array(
                'volumecount' => -1,
            ),
            'id=:id',
            array(
                ':id' => $this->bookid,
            )
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
		$criteria->compare('bookid',$this->bookid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('chaptercount',$this->chaptercount);
//		$criteria->compare('wordcount',$this->wordcount);
		$criteria->compare('createtime',$this->createtime);
//		$criteria->compare('updatetime',$this->updatetime);
		$criteria->compare('sort',$this->sort);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}