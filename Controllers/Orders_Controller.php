<?php
require_once 'Models/Orders_Model.php';
class Orders_Controller 
{
	/**
	 * Function get the list of orders along with their details.
	 * @return void
	 */
	public function orders() 
	{
		if(!isset($_SESSION['admin']))
			header("Location:../Login_Controller/Login");
		
		$model_obj = new Orders_Model();
		$result = $model_obj->Orders();
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
		$model_obj = new Orders_Model();
		$model_obj->Delivery_Status($id,$active);
	}
}