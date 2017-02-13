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
	
	public function __construct()
	{
		parent::__construct();
		$obj = new Model_Factory();
		$this->Model = $obj->load_model();
	}
}