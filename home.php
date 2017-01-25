<?php
session_start();
define('BASE_URL','http://localhost:8080/BuyMore/');

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
}

$app = new Bootstrap();


?>