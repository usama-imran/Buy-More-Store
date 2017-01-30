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
	/**
	 * Will Execute the method in the url
	 * @param string $url 
	 * @return boolean
	 */
	public  function execute_method($url)
	{
		$url = explode("/", $url);
		$file = 'Controllers/'.$url[0].'.php';
		
		if(file_exists($file))
		{
			include_once $file;
			$controller = new $url[0];
			$name = explode("_",$url[0]);
			$controller->load_model($name[0]);
		}
		else
		{
			if(empty($url[0]))
			{
				$controller = new Index_Controller();
				$controller->load_model("Index");
				$controller->Index();
				return false;
			}
		}
		if (isset($url[2]))
		{
			$controller->{$url[1]}($url[2]);
		}
		else
		{
			if (isset($url[1]))
			{
				$controller->{$url[1]}();
			}
		}
	}
}