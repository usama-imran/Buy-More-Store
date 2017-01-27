<?php
class Login_Model extends Model
{
	/**
	 *  Login method to validate a user exists or not
	 *  @param $email will be the email input of the user trying to login
	 *  @param $password will be the passowrd input of the user trying to login
	 *  @return array $array 
	 */
	public function login($email,$password)
	{
		$sql_query = "SELECT * FROM users where email = '$email' and password = '$password' ";
		$result = $this->conn->query($sql_query);
		return $result;
	}
}

?>