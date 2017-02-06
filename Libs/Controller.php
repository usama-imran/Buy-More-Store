<?php

class Controller
{
	public  $Model;
	
	/**
	 * @todo Modle to load only when the child class is requesting the modle object
	 */
	public function __construct()
	{
		$this->View = new View();
		$obj = new Model_Factory();
		$this->Model = $obj->load_model();
	}
}