<?php
class View
{
	public function load($name)
	{
		require_once 'Views/'.$name.'.php';
	}
}