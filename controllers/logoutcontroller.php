<?php
 
class LogoutController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
		$this->_setLobj();
		$this->_lobj->checkLoginOnCall();
	}
	
	public function index()
	{
		//session_start();
        unset($_SESSION["username"]);
       // header('location: '.URL.'Login');
        return $this->_view->output();		
		
	}
}
