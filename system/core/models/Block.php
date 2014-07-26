<?php

/**
 * This is the model class for table "block".
 *
 * The followings are the available columns in table 'block':
 * @property integer $bid
 * @property string $blockname
 * @property string $modname
 * @property string $filename
 * @property string $classname
 * @property integer $side
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $vars
 * @property string $template
 * @property integer $cachetime
 * @property integer $contenttype
 * @property integer $weight
 * @property integer $showstatus
 * @property integer $custom
 * @property integer $canedit
 * @property integer $publish
 * @property integer $hasvars
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
			array('title, description, content, vars', 'required'),
			array('side, cachetime, contenttype, weight, showstatus, custom, canedit, publish, hasvars', 'numerical', 'integerOnly'=>true),
			array('blockname, modname, filename, classname, template', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bid, blockname, modname, filename, classname, side, title, description, content, vars, template, cachetime, contenttype, weight, showstatus, custom, canedit, publish, hasvars', 'safe', 'on'=>'search'),
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
			'blockname' => 'Blockname',
			'modname' => 'Modname',
			'filename' => 'Filename',
			'classname' => 'Classname',
			'side' => 'Side',
			'title' => 'Title',
			'description' => 'Description',
			'content' => 'Content',
			'vars' => 'Vars',
			'template' => 'Template',
			'cachetime' => 'Cachetime',
			'contenttype' => 'Contenttype',
			'weight' => 'Weight',
			'showstatus' => 'Showstatus',
			'custom' => 'Custom',
			'canedit' => 'Canedit',
			'publish' => 'Publish',
			'hasvars' => 'Hasvars',
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
		$criteria->compare('modname',$this->modname,true);
		$criteria->compare('filename',$this->filename,true);
		$criteria->compare('classname',$this->classname,true);
		$criteria->compare('side',$this->side);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('vars',$this->vars,true);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('cachetime',$this->cachetime);
		$criteria->compare('contenttype',$this->contenttype);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('showstatus',$this->showstatus);
		$criteria->compare('custom',$this->custom);
		$criteria->compare('canedit',$this->canedit);
		$criteria->compare('publish',$this->publish);
		$criteria->compare('hasvars',$this->hasvars);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}