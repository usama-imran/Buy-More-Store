<?php
/**
 * Class responsible for making the objects of the controller & to execute the request made by the user
 * @author Usama
 * 
 */
class Controller_Factory
{
	public $controller = null,
		   $method = null,
		   $args = null;
	private $request = null;
	
 	/**
  	 * Will execute the requested method from the requested controller
  	 * @return void
  	 */   
	public function __construct()
	{
		$this->request = new Request();
		$this->controller = $this->request->get_controller();
		$this->method = $this->request->get_action();
		$this->args = $this->request->get_args();
	}
	/**
	 * Will execute the requested method from the requested controller
	 * @throws Exception if the requested controller OR method not found
	 * @return void
	 * @todo this method should be here or not? 
	 */
	public function execute()
	{
		try {
			if($this->request->page_exist()) {
				$controller = new $this->controller();
				if(empty($this->args)){
					$controller->{$this->method}();
				} else if (!empty($this->args)) {
					$controller->{$this->method}($this->args);
				}
			} else {
				throw new Exception("Error");
			} 
		} catch (Exception $e) {
				new Error_Controller();
			}
	}
}