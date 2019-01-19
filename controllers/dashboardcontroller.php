<?php
 
class DashboardController extends Controller
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
		return $this->_view->output();		
	}

	public function graph()
 	{		
		return $this->_view->output();
	}
}
?>