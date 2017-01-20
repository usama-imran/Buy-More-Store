<?php
/**
* CRUD Operations on categories on Model level
*/
class Category
{
	/**
	* Method to list all the rows of the table
	* @return $array
	*/
	function categories()
	{
	// connection to the database
	
	$sql_query = "SELECT category.cat_id,category.cname,category.description,category.date_created , users.first_name FROM category JOIN users ON category.created_by=users.person_id;";
    $result = $mysqli->query($sql_query);
    $array = mysqli_fetch_all($result,true);
    return $array;
	}
}
?>