<?php
require_once 'config.php';
class Orders_Model
{
	private $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
	/**
	 * Select the order along with their details from the databas
	 * @return array
	 */
	public function Orders()
	{		
		$order = "SELECT * FROM cart";
		$cart = "SELECT C.order_id, P.name, CP.quantity, U.first_name , C.credit_card_no FROM cart C JOIN cart_products CP ON C.order_id = CP.order_id JOIN users U ON CP.person_id = U.person_id JOIN product P ON CP.product_id = P.product_id";
		$order_result = $this->conn->query($order);
		$order_result = mysqli_fetch_all($order_result,true);
		$cart_result = $this->conn->query($cart);
		$cart_result = mysqli_fetch_all($cart_result,true);
		return array ($order_result,$cart_result);		
	}
	/**
	 * Will update the database , change the delivery status of the order
	 * @param number $id
	 * @param boolean $status
	 */
	public function Delivery_Status($id,$status)
	{
		$sql_query = "UPDATE `cart` SET `active` = $status WHERE `cart`.`order_id` = $id;";
		$this->conn->query($sql_query);
	}
}