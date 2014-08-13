<?php

/**
 * This is the model class for table "{{friendlink}}".
 *
 * The followings are the available columns in table '{{friendlink}}':
 * @property integer $id
 * @property integer $sequence
 * @property string $name
 * @property string $url
 * @property string $description
 * @property string $logo
 * @property integer $type
 * @property integer $status
 * @property string $dateline
 */
class Friendlink extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Friendlink the static model class
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
		return '{{friendlink}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, url, status', 'required'),
			array('sequence, type, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('url, logo, description', 'length', 'max'=>255),
			array('dateline', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sequence, name, url, description, logo, type, status, dateline', 'safe', 'on'=>'search'),
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
			'id' => '友链编号',
			'sequence' => '排序',
			'name' => '站名',
			'url' => '链接',
			'description' => '简介',
			'logo' => 'Logo',
			'type' => '类型',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('sequence',$this->sequence);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function getLinkStr(){
		return CHtml::link($this->name,$this->url);
	}
	public function getLinkLogo($logo){
		if(empty($logo)){
			return;
		}
		return DS.$logo;
	}
}