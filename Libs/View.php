<?php
class View
{
	public function load($name,$result = Null)
	{
		require_once 'Views/'.$name.'.php';
	}
	
}