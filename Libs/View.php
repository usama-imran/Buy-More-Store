<?php
/**
 * 
 * @author Usama
 * Class will have the method for loading the views called by the controller. 
 */
class View
{
	private $request;
	public $name;
	
	public function __construct()
	{
		$this->request = new Request();
		$this->name = $this->request->get_action();
	}
}