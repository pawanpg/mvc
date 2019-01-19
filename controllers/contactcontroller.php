<?php
 
class ContactController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
	}
	
	public function index()
	{				
		$this->_view->set('page','contact');
		return $this->_view->output();		
	}
}
?>