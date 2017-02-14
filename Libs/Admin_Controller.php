<?php

class Admin_Controller extends CRUD_Controller
{
	public $result;
	function __construct() 
	{
		parent::__construct();
		$this->View = new Admin_View($this->result);
	}
}