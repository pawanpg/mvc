<?php
class RegisterModel extends Model
{
	private $_name;
	private $_age;
	private $_email;
	private $_password;

	public function _setName($name){
		$this->_name = $name;
	}

	public function _setAge($age){
		$this->_age = $age;
	}

	public function _setEmail($email){
		$this->_email = $email;
	}

	public function _setPassword($password){
		$this->_password = $password;
	}

	public function nameerror()
	{
		$nameerror = "Please Enter Name";
	}

	public function _register()
	{		
		$data = array($this->_name, $this->_age, $this->_email, $this->_password);
		$sql = "INSERT INTO users( name, age, email, password) VALUES (?,?,?,?) ";

		
		$this->_setSql($sql);

		$user = $this->_db->prepare($sql);
		$user->execute($data); 
		
		if (empty($user))
		{
			return false;
		}
		else
		{				
			return $this->_db->lastInsertId() ;
		}
	}

	public function _emailExist()
	{		
		$data= array($this->_email);
		$sql = "SELECT * FROM users WHERE email = ? ";
		
		
		$this->_setSql($sql);
		$userData = $this->getRow($data);
	
		if (empty($userData))
		{
			return false;
		}
		else
		{				
			return $userData;
			print_r($userData);

		}
	}
}