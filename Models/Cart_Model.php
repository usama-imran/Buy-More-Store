<?php
class Cart_Model extends Model
{
	/**
	 * Will post the checked out cart to the database tables. 
	 * Insertion will take place at two places.
	 * @param integer $id will be the id of the person checking out
	 */
	public function check_out($id)
	{
		if(sizeof($_SESSION['pro_array'])>0)
		{
			$sql_query = "INSERT INTO `cart` (`order_id`,user_id,`active`,`date_created`) VALUES (NULL,$id,1,CURRENT_TIMESTAMP);";
			if($this->conn->query($sql_query) == TRUE)
			{
				$cart_no = $this->conn->insert_id;
			}
			foreach ($_SESSION['pro_array'] as $value)
			{
				$product_id = $value['product_id'];
				$product_quantity = $value['product_quantity'];
				$insert_products = "INSERT INTO `cart_products` (`cart_pro_id`, `product_id`, `person_id`, `order_id`, `quantity`)
				VALUES (Null, '$product_id', '$id', '$cart_no', '$product_quantity')";
				$this->conn->query($insert_products);
			}
		}
	}
}