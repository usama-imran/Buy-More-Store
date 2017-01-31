<?php

class Controller
{
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
	/**
	 * Will Execute the method in the url
	 * @param string $url 
	 */
	public  function execute($url)
	{
		
		$url = explode("/", $url);
		if(empty($url[0]))
		{
			$index = new Index_Controller();
			$index->load_model("Index");
			$index ->index();
		}
		$file = 'Controllers/'.$url[0].'.php';
		try
		{
			if(file_exists($file))
			{
				include_once $file;
				$controller = new $url[0];
				$name = explode("_",$url[0]);
				$controller->load_model($name[0]);
				// Check if there is a method name in the url
				if (isset($url[1]))
				{
					try
					{
						if(method_exists($controller,$url[1]))
						{
							$controller->{$url[1]}();
						}
						else
						{
							throw new Exception("Error");
						}
					}
					catch (Exception $e)
					{
						new Error_Controller();
					}
				}
				else if (isset($url[2]))
				{
					$controller->{$url[1]}($url[2]);
				}			
			}
			else 
			{
				throw new Exception("Error");
			}
		}
		catch (Exception $e)
		{
			new Error_Controller();
		}
		
	}
}