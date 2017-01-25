<?php
class Orders_Controller extends Controller
{
	private $model_obj;
	
	public function __construct()
	{
		parent::__construct();
		$this->model_obj= new Orders_Model();
	}
	
	/**
	 * Function get the list of orders along with their details.
	 * @return void
	 */
	public function orders() 
	{
		if(!isset($_SESSION['admin']))
			header("Location:../Login_Controller/Login");
		
		$result = $this->model_obj->Orders();
		$result[0];
		$result[1];
		require_once 'Views/Admin/order_index.php';
	}
	/**
	 * Function to post the data to the model to update delivery status of the order
	 * @return void
	 */
	public function delivery_status()
	{
		$id = $_POST['order_id'];
		$active = $_POST['active'];
		$this->model_obj->Delivery_Status($id,$active);
	}
}