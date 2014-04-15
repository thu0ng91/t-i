<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $password;
	public $repassword;
	public $verifyCode;
    public $email;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
//			array('username, password, repassword, verifyCode', 'required', 'message' => '不能为空'),
			array('username, password, repassword', 'required', 'message' => '不能为空'),
            array(
                'username',
                'length',
                'min' => 3,
                'max' => 20,
                'tooLong' => '用户名需要3到20个字符，不区分大小写',
                'tooShort' => '用户名需要3到20个字符，不区分大小写',
            ),
            array(
                'password',
                'length',
                'min' => 6,
                'max' => 20,
                'tooLong' => '密码需要6到20个字符',
                'tooShort' => '密码需要6到20个字符',
            ),
            array(
                'username',
                'unique',
                'className' =>  'Member',
                'attributeName' => 'username',
                'caseSensitive' => false,
                'skipOnError' => false,
                'message' => '用户名已存在',
            ),
            array(
                'email',
                'email',
//                'message' => '电子邮件不正确',
            ),
//			array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
            array('repassword', 'compare', 'compareAttribute' => 'password', 'message' => '两次密码不一致'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>'用户名',
			'password'=>'用户密码',
            'repassword' => '确认密码',
			'verifyCode'=>'验证码',
		);
	}
}
