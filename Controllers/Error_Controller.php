<?php
/**
 * Will show the error page whenever there is an error
 * @todo autoload views in this controller (later)
 * @author Usama
 *
 */
class Error_Controller extends Controller 
{
	public function __construct()
	{
		require_once BASE_PATH.'/Views/Page_Header.php';
		require_once BASE_PATH.'/Views/Error.php';
		require_once BASE_PATH.'/Views/Footer.php';
	}
}