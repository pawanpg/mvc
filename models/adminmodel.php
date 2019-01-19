<?php
class AdminModel extends Model
{
	private $_userId;
	private $_username;

	public function _setUserId($userId){
		$this->_userId = $userId;
	}
	public function _setUserName($name){
		$this->_username = $name;
	}

	public function _getUser()
	{		
		$data = array($this->_userId);
		$sql = 'SELECT * from users WHERE id = ?';
		$this->_setSql($sql);
		$userData = $this->getRow($data);
		
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