<?php

/**
 * This is the model class for table "searchlog".
 *
 * The followings are the available columns in table 'searchlog':
 * @property string $id
 * @property string $keywords
 * @property string $nums
 * @property string $result_nums
 * @property string $lasttime
 * @property string $dateline
 */
class Searchlog extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Searchlog the static model class
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
		return 'searchlog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('keywords, nums, result_nums, lasttime', 'required'),
			array('keywords', 'length', 'max'=>25),
			array('nums', 'length', 'max'=>8),
			array('result_nums', 'length', 'max'=>4),
			array('lasttime, dateline', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, keywords, nums, result_nums, lasttime, dateline', 'safe', 'on'=>'search'),
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
			'keywords' => 'Keywords',
			'nums' => 'Nums',
			'result_nums' => 'Result Nums',
			'lasttime' => 'Lasttime',
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
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('nums',$this->nums,true);
		$criteria->compare('result_nums',$this->result_nums,true);
		$criteria->compare('lasttime',$this->lasttime,true);
		$criteria->compare('dateline',$this->dateline,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}