<?php 

class ErrorController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);		
	}

	public function index()
	{		
		return $this->_view->output();		
	}

	public function nameError()
	{
		return 'Please Enter Name';
	}

	public function ageError()
	{
		return 'Please Enter Age';
	}

	public function emailError()
	{
		return 'Please Enter Email';
	}

	public function passwordError()
	{
		return 'Please Enter Password';
	}

	public function charError()
	{
		return 'Only Charaters are allowed';
	}

	public function intError()
	{
		return 'Only Digits are allowed';
	}

	public function validEmailError()
	{
		return 'Please Enter Valid Email id';
	}

	public function validPasswordError()
	{
		return 'Password length should be atleast 5 & alphanumeric ';
	}
}