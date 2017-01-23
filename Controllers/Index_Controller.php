<?php
require_once 'Models/Index_Model.php';
class Index_Controller
{
	public function index() 
	{
		$cat_id = 30;
		if(isset($_POST['catid']))
		{
			$cat_id = $_POST['catid'];
		}
		echo $cat_id;
		$model_obj = new Index_Model();
		$result = $model_obj->index();
		$result[0];
		$result[1];
		$array = array();
		require_once 'Views/User/Index.php';
	}
}
?>