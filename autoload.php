<?php
function __autoload($class_name)
{
	if(is_file("Libs/".$class_name.".php")){
		include_once "Libs/".$class_name.".php";
	} else if (is_file("Models/".$class_name.".php")) {
		include_once "Models/".$class_name.".php";
	} else if (is_file("Controllers/".$class_name.".php")) {
		include_once "Controllers/".$class_name.".php";
	} else if (is_file($class_name.".php")) {
		include_once $class_name.".php";
	}
}
