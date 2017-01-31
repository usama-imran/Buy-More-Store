<?php
session_start();
define('BASE_URL','http://localhost:8080/BuyMore/');
define ('BASE_PATH',dirname(__FILE__));

require_once 'database.php';
require_once 'autoload.php';
$url = isset($_GET['url']) ? $_GET['url'] : null;

try 
{
	if(class_exists('Bootstrap'))
	{ new Request($url);}
	else
	{ throw new Exception("Error");}
}
catch (Exception $e)
{
	new Error_Controller();
}

?>