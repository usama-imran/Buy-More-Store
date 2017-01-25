<?php
if(!isset($_SESSION['create_array']))
{
	$_SESSION['create_array'] = 1;
	$_SESSION['pro_array'] = array();
}
// require_once 'Models/Index_Model.php';
class Index_Controller extends Controller
{
	private $model_obj;
	
	public function __construct()
	{
		parent::__construct();
		$this->model_obj= new Index_Model();
	}
	
	/**
	 * Will load the index view along with the categories menu
	 * @return void
	 */
	public function index() 
	{
		$result = $this->model_obj->index();
		require_once 'Views/User/Index.php';
// 		$this->View->load('User/Index');
	}
	/**
	 * Will load the products by category according to the category clicked
	 * @return void
	 */
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
		$pro_by_cat = $this->model_obj->get_product_by_category($id);
		require_once 'Views/User/Product_By_Category.php';
	}
}
?>