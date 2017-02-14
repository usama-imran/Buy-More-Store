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
		new Error_View();
	}
}