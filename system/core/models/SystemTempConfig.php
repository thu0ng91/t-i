<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class SystemTempConfig extends CFormModel
{
	public $PageShowNums;
	public $LastupdateShowNums;
	public $TopShowNums;
	public $commentStatus;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('PageShowNums', 'required'),
            array('PageShowNums,LastupdateShowNums,TopShowNums,commentStatus', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'PageShowNums' => '分类页面显示条数',
			'LastupdateShowNums' => '最后更新页面显示条数',
			'TopShowNums' => '排行榜页面显示条数',
			'commentStatus' => '目录页评论开关',
		);
	}
}
