<?php
class View
{
	public function __construct()
	{	
	}
	
	public function load($name)
	{
		require_once 'Views/'.$name.'.php';
	}
}