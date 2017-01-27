<?php
class View
{
	/**
	 * Will load the view
	 * @param string $name Will be the name of the view
	 * @param array $result will be the data sent to the view
	 */
	public function load($name,$result = Null)
	{
		require_once 'Views/'.$name.'.php';
	}
}