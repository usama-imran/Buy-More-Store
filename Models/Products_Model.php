<?php
require_once 'config.php';
/**
* CRUD Operations on categories on Model level
*/
class Products_Model
{
	private $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
	
	/**
	 * Method to get all the rows of the table
	 * @return $array
	 */
	public function products()
	{
	$sql_query = "SELECT product.product_id,product.cat_id,product.name,product.price,product.quantity,product.description,product.date_created , users.first_name ,category.cname
			FROM product 
            JOIN users ON product.created_by=users.person_id
            JOIN category ON product.cat_id=category.cat_id";
	$result = $this->conn->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
	/**
	* Add a new product to database table
	* @param $name will be the name of the product
	* @param $price will be the price of the product
	* @param $image will be the name of the immage 
	* @param $quantity will be the number of items
	* @param $description will be the detailed discription of the product
	* @param $category will tell the category of the created product
	* @param $is_active is the state of the product(Available\Not Available)
	* @param $created_by will be the id of the person logged in
	* @return void
	*/
	function add_product($name,$price,$image,$quantity,$description,$category,$is_active,$created_by)
	{
	$sql_query = "INSERT INTO `product` (`product_id`, `name`, `price`, `description`,`quantity`,`image`, `date_created`, `created_by`, `is_active`, `cat_id`) 
	VALUES (NULL,'$name','$price','$description','$quantity','$image',CURRENT_TIMESTAMP,'$created_by','$is_active','$category');" ;
    $this->conn->query($sql_query) or trigger_error("Query Failed! SQL: $sql_query - Error: ".mysqli_error(), E_USER_ERROR);
	}
	/**
	 * Method to edit an existing category
	 * @return void
	 */
	function edit($id)
	{
		$sql_query = "SELECT * FROM product WHERE product_id = '$id'";
		$array = $this->conn->query($sql_query);
		return $array;
	}
	/**
	 * Method to edit an existing category
	 * @return void
	 */
	function edit_product($pro_id,$pro_name,$pro_price,$pro_quantity,$pro_desc,$pro_category,$pro_is_active)
	{
		$sql_query = "UPDATE `product` SET `name` = '$pro_name', `price` = '$pro_price', `description` = '$pro_desc', `quantity` = '$pro_quantity', `is_active` = '$pro_is_active', `cat_id` = '$pro_category' WHERE `product`.`product_id` = $pro_id;";
		$this->conn->query($sql_query);
	}
}
?>