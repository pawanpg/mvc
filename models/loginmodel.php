<?php
class LoginModel extends Model
{
	private $_email;
	private $_password;

	public function _setEmail($email){
		$this->_email = $email;
	}

	public function _setPassword($password){
		$this->_password = $password;
	}

	public function _setId($id){
		$this->_id = $id;
	}


	public function _userEmail()
	{		
		$data = array($this->_id);
		$sql = "SELECT email FROM users WHERE id = ? ";

		
		$this->_setSql($sql);
		$userData = $this->getRow($data);
		
		if (empty($userData))
		{
			return false;
		}
		else
		{				
			return $userData['email'];
		}
	}


	public function _login()
	{		
		$data = array($this->_email, $this->_password);
		$sql = "SELECT * FROM users WHERE email = ? and password = ?";

		
		$this->_setSql($sql);
		$userData = $this->getRow($data);
		//$failId   = 
		if (empty($userData))
		{
			return false;
		}
		else
		{				
			return $userData;

		}
	}
}