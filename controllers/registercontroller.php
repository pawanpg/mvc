<?php 

class RegisterController extends Controller{

	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
		$this->_setGobj();	
		$this->_setEobj();
	}

	public function index()
	{

		$this->_view->set('page','register');
		return $this->_view->output();		
	}

	public function checkregister()
	{
		if($_POST)
		{
			$_name		= $this->_gobj->_sanitize($_POST['name']);
			$_age		= $this->_gobj->_sanitize($_POST['age']);
			$_email 	= $this->_gobj->_sanitize($_POST['email']);
			$_password 	= $this->_gobj->_sanitize($_POST['password']);
			$_errors 	= array();
			$_user = "";

			$this->_model->_setName($_name);
			$this->_model->_setAge($_age);
			$this->_model->_setEmail($_email);
			$this->_model->_setPassword($_password);
			

			if (empty($_name))  
			{
				$_errors['nameerror'] = $this->_eobj->nameError();
				
			}
			else
			{
				if($this->_gobj->_onlyChar($_name))
				{
					$_name = $this->_gobj->_data;
				}
				else
				{
					$_errors['nameerror'] = $this->_gobj->_data;
				}
				//if (!preg_match("/^[a-z A-Z]*$/",$_name)) {
				//$_errors['nameerror'] = $this->_eobj->charError();
			}
			

			if (empty($_age)) 
			{
				$_errors['ageerror'] = $this->_eobj->ageError();
			}
			else
			{
				if($this->_gobj->_onlyInt($_age))
				{
					$_age = $this->_gobj->_data;
				}
				else
				{
					$_errors['ageerror'] = $this->_gobj->_data;
				}
				//if (!preg_match("/^[0-9]*$/",$_age)) {
				//$_errors['ageerror'] = $this->_eobj->intError();
			}	


			if (empty($_email)) 
			{
				$_errors['emailerror'] = $this->_eobj->emailError();
			}
			else
			{
				if($this->_gobj->_validEmail($_email))
				{
					$_email = $this->_gobj->_data;
				}
				else
				{
					$_errors['emailerror'] = $this->_gobj->_data;
				}
				//if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
				//$_errors['emailerror'] = $this->_eobj->intError();
			}	


			if (empty($_password)) 
			{
				$_errors['passworderror'] = $this->_eobj->passwordError();
			}
			else
			{
				if($this->_gobj->_validPassword($_password))
				{
					$_password = $this->_gobj->_data;
				}
				else
				{
					$_errors['passworderror'] = $this->_gobj->_data;
				}
				
			}	



			if(empty($_errors))
			{
			  	$_result = $this->_model->_emailExist();
				  	if ($_result) 
				  	{
				  		$this->_setView('index');
						$this->_view->set('msg','This Email is already exist');
						$this->_view->output();
						exit();
					}

			  	$_user = $this->_model->_register();
				  	if($_user)
					{
					
						header( 'Location: '.URL.'login/msg=You are Registered Please Login To start Your Session&id='.$_user);
						
					}
					else
					{
						
						$this->_setView('index');
						$this->_view->set('msg','Unable To register');
						$this->_view->output();
					}
			}
			else
			{
		 		$this->_setView('index');
				$this->_view->set('errors', $_errors);
				$this->_view->set('name', $_name);
				$this->_view->set('age', $_age);
				$this->_view->set('email', $_email);
				return $this->_view->output();
		 	}		
		}
	}
}

?>