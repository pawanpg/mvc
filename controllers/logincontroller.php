<?php 
 
class LoginController extends Controller{

	public function __construct($model, $action)
	{
		parent::__construct($model, $action);
		$this->_setModel($model);
		$this->_setGobj();		
		$this->_setEobj();
		//$this->checkloginOnCall();
	}

	
	
	public function index($query = null)
	{
		$data =  array();
		if($query)
		{
			$data = $this->_gobj->_explodeGet($query);
			$_id  = "";
			if(isset($data['id']))
			{
				$_id = $data['id'];
			}	
			//$this->_view->set('id', $_id);
			$this->_model->_setId($_id);
			$data['userEmail'] = $this->_model->_userEmail();
			
		}
		$this->_view->set('page','login');
		$this->_view->set('success',$data);
		return $this->_view->output();	
		//$this->checkloginOnCall();
		
	}
	
	public function checklogin()
	{
		if($_POST)
		{
			$_email 	= $this->_gobj->_sanitize($_POST['email']);
			$_password 	= $this->_gobj->_sanitize($_POST['password']);
			$_errors 	= array();
			$_user 		= "";

			$this->_view->set('email', $_email);
			$this->_view->set('password', $_password);

			$this->_model->_setEmail($_email);
			$this->_model->_setPassword($_password);
 
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
				
			  	$_user = $this->_model->_login();

				if($_user)
				{
					$_SESSION['username'] = $_user['email'];
					header( 'Location: '.URL.'dashboard');
					
				}
				else
				{
					unset($_SESSION['username']);
					$this->_setView('index');
					$this->_view->set('msg1','Please Use right password');
					$this->_view->set('email', $_email);
					$this->_view->output();
				}
			}
			else
			{
		 		$this->_setView('index');
				$this->_view->set('errors', $_errors);
				$this->_view->set('email', $_email);
				return $this->_view->output();
		 	}		
		}
	}

	public  function checkLoginOnCall()
	{
		if(!isset($_SESSION['username']))
		{
			header( 'Location: '.URL.'login/msg1= Please Login First');
		}
	}
}

?>