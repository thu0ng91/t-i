<?php

/**
 * This is the model class for table "member_book".
 *
 * The followings are the available columns in table 'member_book':
 * @property string $id
 * @property integer $memberid
 * @property integer $bookid
 * @property integer $readchapterid
 * @property string $readchaptertitle
 * @property integer $createtime
 * @property integer $updatetime
 */
class MemberBook extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MemberBook the static model class
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
		return 'member_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('memberid, bookid', 'required'),
			array('memberid, bookid, readchapterid, createtime, updatetime', 'numerical', 'integerOnly'=>true),
			array('readchaptertitle', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, memberid, bookid, readchapterid, readchaptertitle, createtime, updatetime', 'safe', 'on'=>'search'),
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
			'memberid' => 'Memberid',
			'bookid' => 'Bookid',
			'readchapterid' => 'Readchapterid',
			'readchaptertitle' => 'Readchaptertitle',
			'createtime' => 'Createtime',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('memberid',$this->memberid);
		$criteria->compare('bookid',$this->bookid);
		$criteria->compare('readchapterid',$this->readchapterid);
		$criteria->compare('readchaptertitle',$this->readchaptertitle,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('updatetime',$this->updatetime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}