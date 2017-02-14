<?php
/**
 * Controller for User side extending the base CRUD Controller.
 * @author Usama
 *
 */
class User_Controller extends CRUD_Controller
{
	public $result;
	function __construct() 
	{
		parent::__construct();
		$this->View = new User_View($this->result);
	}
}