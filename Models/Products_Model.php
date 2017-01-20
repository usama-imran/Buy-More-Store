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
	public function categories()
	{
	$sql_query = "SELECT category.cat_id,category.cname,category.description,category.date_created , users.first_name FROM category JOIN users ON category.created_by=users.person_id;";
    $result = $this->conn->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
	/**
	 * Method to add a new row to the table
	 * @return $array
	 */
	function add_category($name,$description,$is_active,$created_by)
	{
		$sql_query = "INSERT INTO `category` (`cat_id`, `cname`, `description`, `created_by`, `is_active`, `date_created`)
		VALUES (NULL, '$name', '$description', '$created_by', '$is_active', CURRENT_TIMESTAMP);";
		$this->conn->query($sql_query);
	}
	/**
	 * Method to edit an existing category
	 * @return void
	 */
	function edit_category($name,$description,$category_id)
	{
		$sql_query = "UPDATE `category` SET `cname` = '$name' ,`description` = '$description'  WHERE `category`.`cat_id` = '$category_id';";
		$this->conn->query($sql_query);
	}
}
?>