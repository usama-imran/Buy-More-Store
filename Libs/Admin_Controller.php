<?php
/**
 * Controller for admin side extending the base CRUD Controller.
 * @author Usama
 *
 */
class Admin_Controller extends CRUD_Controller
{
	public $result;
	function __construct() 
	{
		if(!isset($_SESSION['admin'])) {
			header("Location:".BASE_URL."Login_Controller/Login");
		}
		parent::__construct();
		$this->View = new Admin_View($this->result);
	}
}