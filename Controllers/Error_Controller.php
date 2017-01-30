<?php
class Error_Controller extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->View->load("Error");
	}
}