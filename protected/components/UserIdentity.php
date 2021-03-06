<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$model=User::model();
		$data = $model->findByAttributes(
    		array('email'=>$this->username)
		);

		if(!isset($data))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif (!$this->validate($this->password,$data->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
 		else
 			$this->errorCode=self::ERROR_NONE;
		
		return !$this->errorCode;
	}
	
	
	public function validate($strPlainText, $strHash) {
	
		if (CRYPT_SHA512 != 1) {
			throw new Exception('Hashing mechanism not supported.');
		}
	
		return (crypt($strPlainText, $strHash) == $strHash) ? true : false;
	
	}
}