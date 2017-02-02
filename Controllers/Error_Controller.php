<?php
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