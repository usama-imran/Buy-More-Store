<?php
require_once 'config.php';
/**
 *  Model implementation for index/landing page, CRUD operations on model level
 */
class Index_Model
{
	private $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
	/**
	 *  Get the list of all the available categories having products in them
	 * @return $array
	 */
	function index()
	{		
		$category = "SELECT category.cat_id, category.cname, count(product.cat_id ) 
				FROM category RIGHT OUTER JOIN product ON category.cat_id = product.cat_id GROUP BY product.cat_id ORDER BY category.cname";
		$cat_result = $this->conn->query($category);
		$cat_result = mysqli_fetch_all($cat_result,true);
		return $cat_result;
	}
	/**
	*  Get all the products by category from the database
	* @param $cat_id will tell which category products are to be loaded
	* @return $array
	*/
	function get_product_by_category($cat_id)
	{
		$sql_query = "SELECT * FROM product WHERE `cat_id` = '$cat_id'";
		$result = $this->conn->query($sql_query);
		$array = mysqli_fetch_all($result,true);
		return $array;
	}
}

?>