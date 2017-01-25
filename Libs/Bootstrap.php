<?php

class Bootstrap
{
	public function __construct() 
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = explode("/", $url);
		$file = 'Controllers/'.$url[0].'.php';
		
		try
		{
			if(file_exists($file))
			{
				include_once $file;
				$controller = new $url[0];
			}
			else 
			{
				throw new Exception("There is no such file or directory as: ".$file);
			}
		}
		catch (Exception $e)
		{
			echo "Nothing to display";
// 			require_once 'Controllers/Index_Controller.php';
// 			$controller = new Index_Controller();
// 			$controller->Index();
		}
		
		if(empty($url[0]))
		{
			require_once 'Controllers/Index_Controller.php';
			$controller = new Index_Controller();
			$controller->Index();
			return false;
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