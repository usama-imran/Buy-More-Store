<?php
session_start();
define('BASE_URL','http://localhost:8080/BuyMore/');
define ('BASE_PATH',dirname(__FILE__));
require_once 'autoload.php';

try {
	if(class_exists('Controller_Factory')){ 
		$controller_factory = new Controller_Factory();
		$controller_factory->execute();
	} else { 
		throw new Exception("Error");
	}
	} catch (Exception $e) {
		new Error_Controller();
	}
