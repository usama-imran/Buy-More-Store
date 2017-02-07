<?php
class Orders_Model extends Model
{
	/**
	 * Select the order along with their details from the databas
	 * @return array Will be an associative array
	 */
	public function Orders()
	{		
		$order = "SELECT * FROM cart";
		$cart = "SELECT C.order_id, P.name, CP.quantity, U.first_name , 
				C.credit_card_no FROM cart C 
				JOIN cart_products CP ON C.order_id = CP.order_id 
				JOIN users U ON CP.person_id = U.person_id 
				JOIN product P ON CP.product_id = P.product_id";
		$order_result = $this->conn->query($order);
		$cart_result = $this->conn->query($cart);
		return array ($order_result,$cart_result);		
	}
	/**
	 * Will update the database , change the delivery status of the order
	 * @param number $id will be the id of the order
	 * @param boolean $status status will be Active/Inactive state of the order
	 */
	public function Delivery_Status($id,$status)
	{
		$sql_query = "UPDATE `cart` SET `active` = $status WHERE `cart`.`order_id` = $id;";
		$this->conn->query($sql_query);
	}
}