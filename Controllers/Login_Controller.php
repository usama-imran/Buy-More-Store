<?php
/**
 * Will be responsible for validating the user and create the session w.r.t person logging in
 * @author Usama
 * @todo Views yet to be autoloaded
 *
 */
class Login_Controller extends CRUD_Controller
{
	/**
	 * Will load the login view
	 * @return void
	 */
	public function login()
	{	
		require_once BASE_PATH.'/Views/Login.php';
	}
	/**
	 * Will get the info of the user loggin in, authenticate it, and create a session for it.
	 * @todo else part not working properly, Fix later
	 * @return void
	 */
	function do_login($args)
	{
		//Model class object creation for getting the users data.		
		$result = $this->Model->login($args['email'],$args['password']);
		if($result->num_rows != 0){
			foreach ($result as $value){
				$_SESSION['user_type'] = $value['type']; // get the type of the user i.e Admin/User
				$_SESSION['user_info'] = $value['person_id'];
				$_SESSION['user_name'] = $value ['first_name'];
				if($_SESSION['user_type'] == 'admin'){
					$_SESSION['admin'] = true;
					header("Location:".BASE_URL."Categories_Controller/Categories");
				} else if ($_SESSION['user_type'] == 'user') {
					$_SESSION['user'] = true;
					header("Location:".BASE_URL."Index_Controller/Index");
				}
			}
		} else {
			header("Location:".BASE_URL."Login_Controller/Login");
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
		header("Location:".BASE_URL."Login_Controller/Login");
	}
}