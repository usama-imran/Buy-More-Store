<?php
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories_Controller extends Controller
{
	private $model_obj;
	
	public function __construct()
	{
		parent::__construct();
		$this->model_obj= new Categories_Model();
	}
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function categories()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:../Login_Controller/Login");
    	
        $result = $this->model_obj->categories(); // getting the result from model function
        require_once 'Views/Admin/categories_index.php';
    }
    /**
    * Will get the view to add category
    */
    public function add()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:../Login_Controller/Login");
    	
    	require_once 'Views/Admin/Add_Category.php';
    }
    /**
     * Will add the row category
     * @return void
     */
    public function add_category()
    {
    	$cat_name = $_REQUEST['name'];
    	$cat_description = $_REQUEST['description'];
    	$cat_is_active = $_REQUEST['is_active'];
    	$cat_created_by = $_REQUEST['created_by'];
    	// Creating the object of the model class to call its method to post requested data
    	$this->model_obj->add_category($cat_name,$cat_description,$cat_is_active,$cat_created_by);
    	header("Location:Categories");
    }
    /**
     * Will edit the row
     * @return void
     */
    function edit_category()
    {
    	// requesting the inputs from the posted form
    	$cat_name = $_REQUEST['cat_name'];
    	$cat_description = $_REQUEST['cat_description'];
    	$cat_id = $_REQUEST['cat_id'];
    	// Creating the object of the model class to call its method to post requested data
    	$this->model_obj->edit_category($cat_name,$cat_description,$cat_id);
    }
   
}
?>