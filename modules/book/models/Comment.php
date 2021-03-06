<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property string $id
 * @property string $uid
 * @property string $username
 * @property string $book_id
 * @property string $content
 * @property integer $digest
 * @property string $recommends
 * @property integer $status
 * @property string $dateline
 */
class Comment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Comment the static model class
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
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uid, username, book_id, content, digest, recommends, status, dateline', 'required'),
			array('digest, status', 'numerical', 'integerOnly'=>true),
			array('uid, book_id', 'length', 'max'=>8),
			array('username', 'length', 'max'=>25),
			array('content', 'length', 'max'=>1000),
			array('content', 'filter','filter'=>array($obj=new CHtmlPurifier(),'purify'), 'message'=>'请勿提交非法内容'),
			array('recommends', 'length', 'max'=>6),
			array('dateline', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uid, username, book_id, content, digest, recommends, status, dateline', 'safe', 'on'=>'search'),
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
			'uid' => 'Uid',
			'username' => 'Username',
			'book_id' => 'Book',
			'content' => 'Content',
			'digest' => 'Digest',
			'recommends' => 'Recommends',
			'status' => 'Status',
			'dateline' => 'Dateline',
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
		$criteria->compare('uid',$this->uid,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('book_id',$this->book_id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('digest',$this->digest);
		$criteria->compare('recommends',$this->recommends,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}