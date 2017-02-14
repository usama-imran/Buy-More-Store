<?php

class Error_View extends View
{
	public function __construct() 
	{
		require_once BASE_PATH.'/Views/Page_Header.php';
		require_once BASE_PATH.'/Views/Error.php';
		require_once BASE_PATH.'/Views/Footer.php';
	}
}