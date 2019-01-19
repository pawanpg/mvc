<?php

class Controller
{
	protected $_model;
	protected $_controller;
	protected $_action;
	protected $_view;
	protected $_modelBaseName;
	protected $_gobj;
	protected $_eobj;
	protected $_lobj;

	
	public function __construct($model, $action)
	{
		$this->_controller = ucwords(__CLASS__);
		$this->_action = $action;
		$this->_modelBaseName = $model;
		$this->_view = new View(HOME . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $action . '.tpl');
	}
	
	protected function _setModel($modelName)
	{
		$modelName .= 'Model';
 		$this->_model = new $modelName();
	}
	
	protected function _setView($viewName)
	{
		$this->_view = new View(HOME . DS . 'views' . DS . strtolower($this->_modelBaseName) . DS . $viewName . '.tpl');
	}
	
	protected function _setGobj()
	{
		$this->_gobj = new GlobalController('Global','index');				
	}
	
	protected function _setEobj()
	{
		$this->_eobj = new ErrorController('Error','index');				
	}
 
	protected function _setLobj()
	{
		$this->_lobj = new LoginController('Login','index');
	}
}
