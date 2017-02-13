<?php
/**
 * All controller classes requireing "Modle" will extend from this class.
 * Modle will be autoloaded.  
 * Note: Modle name should be same as the controller name before _Controller.
 * @example Controller = My_Controller, Modle = My_Model
 * @author Usama
 *
 */
class CRUD_Controller extends Controller
{
	public  $Model;
	private $request,
			$method,
			$args;
	
	public function __construct()
	{
		parent::__construct();
		$this->request = new Request();
		$this->method = $this->request->get_action();
		$this->args = $this->request->get_args();
		$obj = new Model_Factory();
		$this->Model = $obj->load_model();
		$this->execute();
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
				if(empty($this->args)){
					$this->{$this->method}();
				} else if (!empty($this->args)) {
					$this->{$this->method}($this->args);
				}
			} else {
				throw new Exception("Error");
			}
		} catch (Exception $e) {
			new Error_Controller();
		}
	}
}