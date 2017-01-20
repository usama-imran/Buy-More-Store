<?php
/**
* CRUD Operations on categories on Model level
*/
class Category
{
	private $conn;
	/**
	* Method to list all the rows of the table
	* @return $array
	*/
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
	
	public function categories()
	{
	// connection to the database
	$sql_query = "SELECT category.cat_id,category.cname,category.description,category.date_created , users.first_name FROM category JOIN users ON category.created_by=users.person_id;";
    $result = $this->conn->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
}
?>