<?php
if(!isset($_SESSION['create_array']))
{
	$_SESSION['create_array'] = 1;
	$_SESSION['pro_array'] = array();
}
/**
 * Will be responsible for populating the index page with products and categories
 * @author Usama
 *
 */
class Index_Controller extends CRUD_Controller
{
	/**
	 * Will load the index view along with the categories menu
	 * @return void
	 */
	public function index() 
	{
		$model = new Index_Model();
		$result = $this->Model->index();
 		$this->View->load('Index',$result);
	}
	/**
	 * Will load the products by category according to the category clicked
	 * @return void
	 */
	public function product_by_category($id)
	{
		if(!empty($_POST)){
			$id = $id['catid'];
		} else {
			$id = 4;
		}
		$result = $this->Model->get_product_by_category($id);
		require_once BASE_PATH.'/Views/Product_By_Category.php';
	}
}
