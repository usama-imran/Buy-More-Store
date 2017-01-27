<?php
/**
 *  Model implementation for index/landing page, CRUD operations on model level
 */
class Index_Model extends Model
{
	/**
	 * Get the list of all the available categories having products in them
	 * @return array $cat_result
	 */
	function index()
	{		
		$sql_query = "SELECT category.cat_id, category.cname, count(product.cat_id ) 
				FROM category RIGHT OUTER JOIN product ON category.cat_id = product.cat_id GROUP BY product.cat_id ORDER BY category.cname";
		$result = $this->conn->query($sql_query);
		return $result;
	}
	/**
	*  Get all the products by category from the database
	* @param integer $cat_id will tell which category products are to be loaded
	* @return array $array
	*/
	function get_product_by_category($cat_id)
	{
		$sql_query = "SELECT * FROM product WHERE `cat_id` = '$cat_id'";
		$result = $this->conn->query($sql_query);
		return $result;
	}
}

?>