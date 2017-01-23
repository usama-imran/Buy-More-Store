<?php

class Cart_Controller
{
	function myArray()
	{
		if(!empty($_POST))
		{
			$data_array = array();
			$pro_id = $_REQUEST['product_id'];
			$pro_name = $_REQUEST['product_name'];
			$pro_price = $_REQUEST['product_price'];
			$pro_quantity = $_REQUEST['product_quantity'];
			$pro_total = $_REQUEST['product_total'];
			$data_array = array (
					"product_id" => $pro_id,
					"product_name" => $pro_name,
					"product_price" => $pro_price,
					"product_quantity" => $pro_quantity,
					"product_total" => $pro_total
			);
			session_start();
			array_push($_SESSION['pro_array'],$data_array);
		}
		return $_SESSION['pro_array'];
	}
	/**
	 * Will fetch the data from the array created in myArray() method & populate the cart
	 * @return $data
	 */
	function cart_status()
	{
		$data = array();
		$response = self::myArray();
		foreach ($response as $val)
		{
			$data[] = $val;
		}
		return $data;
	}
	
 	public function cart()
 	{
 		
 	}
}