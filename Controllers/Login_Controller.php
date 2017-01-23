<?php
require_once 'Models/Login_Model.php';
class Login_Controller
{
	public function login()
	{
		require_once 'Views/login.php';
	}
	
	function do_login()
	{
		$user_email = $_REQUEST['email'];
		$user_password = $_REQUEST['password'] ;
		//Model class object creation for getting the users data.
		$model_object = new Login_Model();
		
		$reslut = $model_object->login($user_email,$user_password);
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