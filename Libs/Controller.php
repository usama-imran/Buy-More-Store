<?php
/**
 * Base Controller Class.
 * @author Usama
 *
 */
class Controller
{
	public function __construct()
	{
		$this->View = new View();
	}
}