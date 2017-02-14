<?php

class User_View extends View
{
	public function __construct($result) 
	{
		parent::__construct();
		require_once BASE_PATH.'/Views/Page_Header.php';
		require_once BASE_PATH.'/Views/'.$this->name.'.php';
		require_once BASE_PATH.'/Views/Footer.php';
	}
}