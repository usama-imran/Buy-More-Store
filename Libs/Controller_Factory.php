<?php
/**
 * Class responsible for making the objects of the controller & to execute the request made by the user
 * @author Usama
 * 
 */
class Controller_Factory
{
	public $controller = null;
	private $request = null;
	
 	/**
  	 * Will execute the requested method from the requested controller
  	 * @return void
  	 */   
	public function __construct()
	{
		$this->request = new Request();
		try {
			echo $this->request->page_exist();
			if($this->request->page_exist()) {
				$this->controller = $this->request->get_controller();
				$this->controller = new $this->controller();
			} else {
			 throw new Exception("Error");		
			}
		} catch (Exception $e) {
			new Error_Controller();
		}
	}
	
}