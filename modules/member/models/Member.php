<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $realname
 * @property integer $level
 * @property integer $vip_level
 * @property string $telephone
 * @property string $qq
 * @property string $email
 * @property string $address
 * @property integer $createtime
 * @property integer $updatetime
 * @property integer $lastlogintime
 * @property integer $status
 * @property integer $loginhits
 */
class Member extends BaseModel
{
    public $repassword;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Member the static model class
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
		return 'member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('username,password', 'required'),
			array('level, vip_level, createtime, updatetime, lastlogintime, status, loginhits', 'numerical', 'integerOnly'=>true),
			array('username, password, realname, telephone, qq, email', 'length', 'max'=>32),
			array('address', 'length', 'max'=>200),
			array('username','unique','caseSensitive'=>false,'message'=>'用户名<span style="color:blue">{value}</span>已经被注册，请更换'),
			array('email', 'email', 'allowEmpty' => true),
			array('password', 'length', 'min'=>6, 'max' => 32, 'allowEmpty' => false),
			array('repassword', 'compare', 'compareAttribute'=>'password', 'message' => "两次密码不一致"),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, password, realname, level, vip_level, telephone, qq, email, address, createtime, updatetime, lastlogintime, status, loginhits', 'safe', 'on'=>'search'),
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
			'username' => '用户名',
			'password' => '密码',
			'repassword' => '确认密码',
			'realname' => '真实姓名',
			'level' => '会员等级',
			'vip_level' => '会员VIP等级',
			'telephone' => '电话',
			'qq' => 'QQ',
			'email' => '邮箱',
			'address' => '住址',
			'createtime' => '注册时间',
			'updatetime' => '更新时间',
			'lastlogintime' => '最后登陆时间',
			'status' => '状态',
			'loginhits' => '登陆次数',
		);
	}

    public function beforeSave()
    {
        if (parent::beforeSave()) {
            $this->password = H::encrpyt($this->password);
            return true;
        }

        return false;
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('vip_level',$this->vip_level);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('qq',$this->qq,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('createtime',$this->createtime);
		$criteria->compare('updatetime',$this->updatetime);
		$criteria->compare('lastlogintime',$this->lastlogintime);
		$criteria->compare('status',$this->status);
		$criteria->compare('loginhits',$this->loginhits);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}