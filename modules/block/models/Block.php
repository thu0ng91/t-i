<?php

/**
 * This is the model class for table "block".
 *
 * The followings are the available columns in table 'block':
 * @property integer $bid
 * @property string $blockname
 * @property string $content
 * @property string $vars
 * @property string $template
 * @property integer $blocktype
 * @property integer $sequence
 * @property integer $status
 */
class Block extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Block the static model class
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
		return 'block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('blockname,content, status', 'required'),
			array('sequence,cachetime, status', 'numerical', 'integerOnly'=>true),
			array('blockname', 'length', 'max'=>50),
			array('blocktype', 'length', 'max'=>25),
			array('vars', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bid, blockname, content, vars, template, blocktype, sequence, status', 'safe', 'on'=>'search'),
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
			'bid' => 'Bid',
			'blockname' => '区块标题',
			'content' => '区块内容',
			'vars' => '区块参数',
			'blocktype' => '区块类型',
			'cachetime' => '缓存时间',
			'sequence' => '排序',
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

		$criteria->compare('bid',$this->bid);
		$criteria->compare('blockname',$this->blockname,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('vars',$this->vars,true);
		$criteria->compare('cachetime',$this->cachetime,true);
		$criteria->compare('blocktype',$this->blocktype);
		$criteria->compare('sequence',$this->sequence);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}