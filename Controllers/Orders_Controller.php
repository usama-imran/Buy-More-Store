<?php
/**
 * Will be responsible for populating the orders and change the delivery status
 * @author Usama
 *
 */
class Orders_Controller extends Admin_Controller
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
		$this->result = $result;
	}
	/**
	 * Function to post the data to the model to update delivery status of the order
	 * @return void
	 */
	public function delivery_status($args)
	{
		$this->Model->Delivery_Status($args['order_id'],$args['active']);
	}
}