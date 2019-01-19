<?php

class GlobalController extends Controller
{
	public $_data;

	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
		$this->_setEobj();
	}

	public function index()
	{
		return false;
	}

 
	# Function To Explode GET Method Value 
	public function _explodeGet($data)
	{
		$params = array();
		$params	= explode("&",$data);

		foreach ($params as $key => $value)
		{
	 		$arr     =  explode("=",$value);
	 		$k       =  $arr[0];
	 		$val   	 =  $arr[1];
	 		$d[$k]   =  $val;
		}
		return $d; 	 	
	}  


	# Function to allow only Charaters can be valid user data
	public function _onlyChar($data)
	{
		if (!preg_match("/^[a-z A-Z]*$/",$data)) {
			$this->_data =  $this->_eobj->charError();
			return false;
		}
		else
		{
			$this->_data = $data;
			return true;
		}	
	}

	# Function to allow only Integers can be valid user data
	public function _onlyInt($data)
	{
		if (!preg_match("/^[0-9]*$/",$data)) {
			$this->_data =  $this->_eobj->intError();
			return false;
		}
		else
		{
			$this->_data = $data;
			return true;
		}	
	}


	# Function validate user given email
	public function _validEmail($data)
	{
		if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
			$this->_data =  $this->_eobj->validEmailError();
			return false;
		}
		else
		{
			$this->_data = $data;
			return true;
		}	
	}


	# Function validate user Password
	public function _validPassword($data)
	{
		if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{5,12}$/', $data)){
			$this->_data =  $this->_eobj->validPasswordError();
			return false;
		}
		else
		{
			$this->_data = $data;
			return true;
		}	
	}


	# Function to sanitize and validate user input
	public function _sanitize($data)
	{
		$data = $this->_xss_clean($data);
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		$data = filter_var($data, FILTER_SANITIZE_STRING);
		return $data;
	}
	
	
	public function _xss_clean($data)
	{
	// Fix &entity\n;
	$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
	$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
	$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
	$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

	// Remove any attribute starting with "on" or xmlns
	$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

	// Remove javascript: and vbscript: protocols
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
	$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

	// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
	$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

	// Remove namespaced elements (we do not need them)
	$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

	do
	{
		// Remove really unwanted tags
		$old_data = $data;
		$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
	}
	while ($old_data !== $data);

	// we are done...
	return $data;
	}

}