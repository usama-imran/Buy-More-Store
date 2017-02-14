<?php
/**
 * Base Controller Class.
 * @author Usama
 */
class Controller
{
	public $request,
			$method,
			$args;
	
	public function __construct()
	{
		$this->request = new Request();
		$this->method = $this->request->get_action();
		$this->args = $this->request->get_args();
	}
}