<?php

class Bootstrap
{
	public function __construct() 
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
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
				require_once 'Controllers/Index_Controller.php';
				$controller = new Index_Controller();
				$controller->Index();
				return false;
			}
			else 
			{
				echo "Nothing to display";
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