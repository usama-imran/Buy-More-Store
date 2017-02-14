<?php

class Admin_View extends View
{
	public function __construct($result) 
	{
		parent::__construct();
		require_once BASE_PATH.'/Views/Navbar.php';
		try {
			if(file_exists(BASE_PATH.'/Views/'.$this->name.'.php')) {
				require_once BASE_PATH.'/Views/'.$this->name.'.php';
			} else {
				throw new Exception("Error");
			}
		} catch (Exception $e) {
			require_once BASE_PATH.'/Views/Error.php';
		}
	}
}