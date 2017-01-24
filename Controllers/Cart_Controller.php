<?php
// Will create the session array only once
if(!isset($_SESSION['create_array']))
{
	$_SESSION['create_array'] = 1;
	$_SESSION['pro_array'] = array();
}
/**
 * Cart Controller will be responsible for managing the cart, add/remove/checkout products from the cart.
 */
class Cart_Controller {
 /**
 * Will load the cart view
 */
 function cart()
 {
 	require_once 'Views/User/Cart.php';
 }

 /**
  * Will check if the session exists , if exists than add the product selected to the array for the cart
  * @return $_SESSION['pro_array']
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
  * Will be responsible for removing item from the cart(array)
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
  * Will post the cart data to database. 
  */
 function check_out() 
 {
 	session_start();
	$user_id = $_SESSION['user_info'];
	$db = new Connection();
	$mysqli = $db->getConnection();
	if(sizeof($_SESSION['pro_array'])>0)
	{
		$sql_query = "INSERT INTO `cart` (`order_id`,user_id,`active`,`date_created`) VALUES (NULL,$user_id,1,CURRENT_TIMESTAMP);";
		if($mysqli->query($sql_query) == TRUE)
        {
            $cart_no = $mysqli->insert_id;
        }
		foreach ($_SESSION['pro_array'] as $value)
		{
			$product_id = $value['product_id'];
			$product_quantity = $value['product_quantity'];
			$insert_products = "INSERT INTO `cart_products` (`cart_pro_id`, `product_id`, `person_id`, `order_id`, `quantity`) 
					VALUES (Null, '$product_id', '$user_id', '$cart_no', '$product_quantity')";
			$mysqli->query($insert_products);
		}
	}
 }  
 /**
  * Will unset the session array after checkout
  */
 function reset_cart()
 {
 	session_start();
 	unset($_SESSION['create_array']);
 	unset($_SESSION['pro_array']);
 	header("Location: ../../../Controller/index_controller/Index_Controller/index");
 }
/**
  * Will update the delivery status of the order
  */
 function delivered()
 {
	$db = new Connection();
	$mysqli = $db->getConnection();
	$id = $_POST['order_id'];
	$sql_query = "UPDATE `cart` SET `active` = '0' WHERE `cart`.`order_id` = $id;";
	$mysqli->query($sql_query);
 }

 function not_delivered()
 {
	$db = new Connection();
	$mysqli = $db->getConnection();
	$id = $_POST['order_id'];
	$sql_query = "UPDATE `cart` SET `active` = '1' WHERE `cart`.`order_id` = $id;";
	$mysqli->query($sql_query);
 }
}// End of class
?>