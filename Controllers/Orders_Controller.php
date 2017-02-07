<?php
/**
 * Will be responsible for populating the orders and change the delivery status
 * @author Usama
 *
 */
class Orders_Controller extends CRUD_Controller
{
	/**
	 * Function get the list of orders along with their details.
	 * @return void
	 */
	public function orders() 
	{
		if(!isset($_SESSION['admin']))
			header("Location:".BASE_URL."Login_Controller/Login");
		
		$result = $this->Model->Orders();
		$this->View->load('order_index',$result);
		
	}
	/**
	 * Function to post the data to the model to update delivery status of the order
	 * @return void
	 */
	public function delivery_status()
	{
		$id = $_POST['order_id'];
		$active = $_POST['active'];
		$this->Model->Delivery_Status($id,$active);
	}
}