<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class MemberIdentity extends CUserIdentity
{
	private $_id;

	public function authenticate()
	{
		$member= Member::model()->find(
            'username=? and password=? and status=?',
            array(
                $this->username,
                H::encrpyt($this->password),
                Yii::app()->params['status']['ischecked'],
            ));
		if($member === null)
			return false;
		else
		{
			$this->_id = $member->id;
			$this->setState('info',$member);
            $member->updateLoginInfo();
			return true;
		}
	}

	public function getId()
    {
        return $this->_id;
    }
}