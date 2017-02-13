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
  */
 function basket($args)
 {
	$data_array = array (
			"product_id" => $args['product_id'],
			"product_name" => $args['product_name'],
			"product_price" => $args['product_price'],
			"product_quantity" => $args['product_quantity'],
			"product_total" => $args['product_total']
	);
	array_push($_SESSION['pro_array'],$data_array);
 }

 /**
  * Will be responsible for removing item from the cart(array).
  * 
  * @todo After deleting one item other items are not deleteable until the page is refreshed, JS issue.
  */
 function remove_from_array($args)
 {		
 	foreach ($_SESSION["pro_array"] as $key => $val) {
 		if ($val["product_name"] == $args['pro_name'] && $val['product_id'] == $args['pro_id']) {
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
