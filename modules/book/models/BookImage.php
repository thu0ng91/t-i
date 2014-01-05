<?php

/**
 * This is the model class for table "book_image".
 *
 * The followings are the available columns in table 'book_image':
 * @property string $id
 * @property integer $bookid
 * @property string $imgurl
 * @property integer $iscover
 */
class BookImage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BookImage the static model class
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
		return 'book_image';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bookid, bookid, imgurl', 'required'),
			array('bookid, iscover', 'numerical', 'integerOnly'=>true),
			array('imgurl', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bookid, imgurl, iscover', 'safe', 'on'=>'search'),
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
			'bookid' => 'Bookid',
			'imgurl' => 'Imgurl',
			'iscover' => 'Iscover',
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
		$criteria->compare('imgurl',$this->imgurl,true);
		$criteria->compare('iscover',$this->iscover);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}