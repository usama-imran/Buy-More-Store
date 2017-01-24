<?php
require_once 'Models/Index_Model.php';
class Index_Controller
{
	public function index() 
	{
		$model_obj = new Index_Model();
		$result = $model_obj->index();
		$array = array();
		require_once 'Views/User/Index.php';
	}
	
	public function product_by_category()
	{
		if(!empty($_POST))
		{
			$id = $_POST['catid'];
		}
		else
		{
			$id = 4;
		}
		$model_obj = new Index_Model();
		$pro_by_cat = $model_obj->get_product_by_category($id);
		
		require_once 'Views/User/Product_By_Category.php';
	}
}
?>