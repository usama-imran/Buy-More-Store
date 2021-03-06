<?php

class Model_Factory
{
	public $model_name = null;
	
	public function __construct() {
		$request = new Request();
		$controller_name = $request->get_controller();
		$controller_name = explode("_",$controller_name);
		$this->model_name = $controller_name[0];
	}
	/**
	 * Will load the model w.r.t to the Controller Name befor "_Controller"
	 */
	public function load_model()
	{
		$path = 'Models/'.$this->model_name.'_Model.php';
		if (file_exists($path))
		{
			$model_name = $this->model_name.'_Model';
			return new $model_name();
		}
	}
}