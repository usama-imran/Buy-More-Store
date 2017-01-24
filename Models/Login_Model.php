<?php
require_once 'config.php';

class Login_Model
{
	private $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
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
		$array = mysqli_fetch_all($result,true);
		return $array;
	}
}

?>