<?php

class Admin_View extends View
{
	public function __construct($result) 
	{
		parent::__construct();
		require_once BASE_PATH.'/Views/Navbar.php';
		require_once BASE_PATH.'/Views/'.$this->name.'.php';
	}
}