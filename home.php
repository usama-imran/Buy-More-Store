<?php
session_start();
define('BASE_URL','http://localhost:8080/BuyMore/');

require_once 'database.php';
function __autoload($class_name)
{	
	
	if(is_file("Libs/".$class_name.".php"))
	{
		include_once "Libs/".$class_name.".php";
	}
	else if (is_file("Models/".$class_name.".php"))
	{
		include_once "Models/".$class_name.".php";
	}
	else if (is_file("Controllers/".$class_name.".php"))
	{
		include_once "Controllers/".$class_name.".php";
	}
}
try 
{
	if(class_exists('Bootstrap'))
	{
	 new Bootstrap();
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

?>