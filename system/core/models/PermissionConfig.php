<?php
class PermissionConfig extends CFormModel
{
	public $downPermission;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('downPermission', 'required'),
            array('downPermission', 'numerical', 'integerOnly'=>true),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'downPermission' => '登录后才可以下载小说',
		);
	}
}
