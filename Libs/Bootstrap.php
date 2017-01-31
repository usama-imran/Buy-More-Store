<?php

class Bootstrap
{
	public function __construct() 
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$call_execute = new Controller();
		$call_execute->execute($url);
	}
}