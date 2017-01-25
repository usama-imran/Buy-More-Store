<?php
require_once 'Models/Login_Model.php';
class Login_Controller extends Controller
{
	private $model_obj;
	
	public function __construct()
	{
		parent::__construct();
		$this->model_obj= new Login_Model();
	}
	/**
	 * Will load the login view
	 * @return void
	 */
	public function login()
	{
		require_once 'Views/login.php';
	}
	/**
	 * Will get the info of the user loggin in, authenticate it, and create a session for it.
	 * @return void
	 */
	function do_login()
	{
		$user_email = $_REQUEST['email'];
		$user_password = $_REQUEST['password'] ;
		//Model class object creation for getting the users data.		
		$reslut = $this->model_obj->login($user_email,$user_password);
		if($reslut)
		{
			foreach ($reslut as $value)
			{
				$_SESSION['user_type'] = $value['type']; // get the type of the user i.e Admin/User
				if($_SESSION['user_type'] == 'admin')
				{
					$_SESSION['user_info'] = $value['person_id'];
					$_SESSION['user_name'] = $value ['first_name'];
					$_SESSION['admin'] = true;
					header("Location:../Categories_Controller/Categories");
				}
				elseif ($_SESSION['user_type'] == 'user')
				{
					$_SESSION['user'] = true;
					$_SESSION['user_info'] = $value['person_id'];
					$_SESSION['user_name'] = $value ['first_name'];
					header("Location:../Index_Controller/Index");
				}
			}
		}
		else
		{
			$error_message = "Invalid Email/Password";
			echo $error_message;
		}
	}
	/**
	 * Logout / Session Destroy Method
	 * @return void
	 */
	function do_logout()
	{
		session_unset();
		session_destroy();
		header("Location:../Login_Controller/Login");
	}
}