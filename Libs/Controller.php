<?php

class Controller
{
	public  $Model;
	
	public function __construct()
	{
		$this->View = new View();
	}
	/**
	 * Will load the model w.r.t its name
	 * @param string $name will be the name of the model before "_Model"
	 */
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