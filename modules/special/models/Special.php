<?php

/**
 * This is the model class for table "special".
 *
 * The followings are the available columns in table 'special':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property string $template
 * @property string $author
 * @property integer $status
 * @property string $dateline
 */
class Special extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Special the static model class
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
		return 'special';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content, template, author, status', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title, template', 'length', 'max'=>100),
			array('content', 'length', 'max'=>1000),
			array('author', 'length', 'max'=>25),
			array('dateline', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, template, author, status, dateline', 'safe', 'on'=>'search'),
		);
	}
	public function beforeSave(){
		if ($this->isNewRecord){
			$this->dateline = time();
		}
		return parent::beforeSave();
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
			'id' => '专题编号',
			'title' => '专题名',
			'content' => '专题简介',
			'template' => '专题模板',
			'author' => '作者',
			'status' => '状态',
			'dateline' => '时间',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}