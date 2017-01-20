<?php
require_once 'Models/Categories_Model.php';
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories_Controller
{
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function categories()
    {
        $data = array();
        $obj = new Category_Model();
        $result = $obj->categories(); // getting the result from model function
        require_once 'Views/Admin/categories_index.php';
        return  $result;
    }
    /**
    * Will get the view to add category
    */
    public function add()
    {
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
    	$model_obj = new Category_Model();
    	$model_obj->add_category($cat_name,$cat_description,$cat_is_active,$cat_created_by);
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
    	$model_obj = new Category_Model();
    	$model_obj->edit_category($cat_name,$cat_description,$cat_id);
    }
   
}
?>