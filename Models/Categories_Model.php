<?php
require_once 'config.php';
/**
* CRUD Operations on categories on Model level
*/
class Category_Model
{
	private $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
	
	/**
	 * Method to get all the rows of the table
	 * @return array $array
	 */
	public function categories()
	{
	$sql_query = "SELECT category.cat_id,category.cname,category.description,category.date_created , users.first_name FROM category JOIN users ON category.created_by=users.person_id;";
    $result = $this->conn->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
	/**
	 * Will add a new category
	 * @param string $name Will be the name of the category
	 * @param string $description Will be the discription of the category
	 * @param boolean $is_active Boolen value to check active state of category
	 * @param integer $created_by Id of the parson who created the category
	 */
	function add_category($name,$description,$is_active,$created_by)
	{
		$sql_query = "INSERT INTO `category` (`cat_id`, `cname`, `description`, `created_by`, `is_active`, `date_created`)
		VALUES (NULL, '$name', '$description', '$created_by', '$is_active', CURRENT_TIMESTAMP);";
		$this->conn->query($sql_query);
	}
	/**
	 * Will edit an existing category
	 * @param string $name Will be the name of category
	 * @param string $description Will be the description of category
	 * @param integer $category_id Will be the Id of the category to be edited
	 */
	function edit_category($name,$description,$category_id)
	{
		$sql_query = "UPDATE `category` SET `cname` = '$name' ,`description` = '$description'  WHERE `category`.`cat_id` = '$category_id';";
		$this->conn->query($sql_query);
	}
}
?>