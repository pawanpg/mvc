<?php

class AdminController extends Controller
{
	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);		
	}
	
	public function index()
	{		
		$this->_view->set('title', 'Zunaweb - Admin');
		return $this->_view->output();
	}

	public function adduser()
	{
		echo '<br/>Add User';
	}

	public function edituser($id)
	{
		$this->_model->_setUserId($id);
		$temp = $this->_model->_getUser();
		$this->_view->set('temp', $temp);
		return $this->_view->output();
	}
}