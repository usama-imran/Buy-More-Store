<?php
/**
 * Cart Controller will be responsible for managing the cart, add/remove/checkout products from the cart.
 */
class Cart_Controller extends CRUD_Controller
{

 /**
 * Will load the cart view
 */
 function cart()
 {
 	$this->View->Load("Cart");
 }

 /**
  * Add the product selected to the array for the cart
  * @return array $_SESSION['pro_array']
  */
 function basket()
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
  * Will be responsible for removing item from the cart(array).
  * 
  * @todo After deleting one item other items are not deleteable until the page is refreshed, JS issue.
  */
 function remove_from_array()
 {		
 	$pro_name=$_POST['pro_name'];
 	$pro_id = $_POST['pro_id'];
 	foreach ($_SESSION["pro_array"] as $key => $val)
 	{
 		if ($val["product_name"] == $pro_name && $val['product_id'] == $pro_id) 
 		{
 			unset($_SESSION["pro_array"][$key]);
 		}
 	}
 }
 /**
  * Will post the cart data to database & clear cart
  */
 function check_out() 
 {
	$user_id = $_SESSION['user_info'];
	$this->Model->check_out($user_id);
	unset($_SESSION['create_array']);
	unset($_SESSION['pro_array']);
 } 
 
}// End of class
