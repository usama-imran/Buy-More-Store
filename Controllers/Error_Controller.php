<?php
/**
 *@todo Error Controller do not require a modle, It is extending the 
 *		Controller class which is loading the modle, 
 *		Create seperate base controller for error OR use some other technique
 */
class Error_Controller extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->View->load("Page_Header");
		$this->View->load("Error");
		$this->View->load("Footer");
	}
}