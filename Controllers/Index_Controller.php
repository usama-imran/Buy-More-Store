<?php
if(!isset($_SESSION['create_array']))
{
	$_SESSION['create_array'] = 1;
	$_SESSION['pro_array'] = array();
}
// require_once 'Models/Index_Model.php';
class Index_Controller extends Controller
{
	/**
	 * Will load the index view along with the categories menu
	 * @return void
	 */
	public function index() 
	{
		$this->View->load('Page_Header');
		$model = new Index_Model();
		$result = $this->Model->index();
 		$this->View->load('Index',$result);
 		$this->View->load('Footer');
	}
	/**
	 * Will load the products by category according to the category clicked
	 * @return void
	 */
	public function product_by_category()
	{
		if(!empty($_POST)){
			$id = $_POST['catid'];
		} else {
			$id = 4;
		}
		$pro_by_cat = $this->Model->get_product_by_category($id);
		$this->View->load('Product_By_Category',$pro_by_cat);
	}
}
