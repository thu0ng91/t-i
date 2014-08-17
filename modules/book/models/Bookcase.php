<?php

/**
 * This is the model class for table "bookcase".
 *
 * The followings are the available columns in table 'bookcase':
 * @property string $id
 * @property string $book_id
 * @property string $userid
 * @property string $username
 * @property string $lastviewtime
 * @property string $dateline
 * @property integer $status
 */
class Bookcase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bookcase the static model class
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
		return 'bookcase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book_id, userid, username, lastviewtime,readchapterid, dateline, status', 'required'),
			array('status,readchapterid,userid,book_id,lastviewtime,dateline', 'numerical', 'integerOnly'=>true),
			array('book_id, userid', 'length', 'max'=>8),
			array('username', 'length', 'max'=>25),
			array('lastviewtime, dateline,readchapterid', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, book_id, userid, username, lastviewtime,readchapterid, dateline, status', 'safe', 'on'=>'search'),
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
			'book_id' => 'Book',
			'userid' => 'Userid',
			'username' => 'Username',
			'lastviewtime' => 'Lastviewtime',
			'dateline' => 'Dateline',
			'readchapterid' => 'Readchapterid',
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
		$criteria->compare('book_id',$this->book_id,true);
		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('lastviewtime',$this->lastviewtime,true);
		$criteria->compare('dateline',$this->dateline,true);
		$criteria->compare('readchapterid',$this->readchapterid,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}