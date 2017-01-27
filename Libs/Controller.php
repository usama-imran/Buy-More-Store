<?php

class Controller
{
	public function __construct()
	{
		$this->View = new View();
	}
	
	public function load_model($name)
	{
		$path = 'Models/'.$name.'_Model.php';
		if (file_exists($path))
		{
			$model_name = $name.'_Model';
			$this->Model = new $model_name();
		}
	}
}