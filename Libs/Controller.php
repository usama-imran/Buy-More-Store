<?php
/**
 * Base Controller Class.
 * @author Usama
 *
 */
class Controller
{
	/**
	 * @todo Modle to load only when the child class is requesting the modle object
	 */
	public function __construct()
	{
		$this->View = new View();
	}
}