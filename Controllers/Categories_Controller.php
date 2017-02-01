<?php
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories_Controller extends Controller
{
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function categories()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:".BASE_URL."Login_Controller/Login");
    	
    	$this->View->Load("Navbar");
        $result = $this->Model->categories(); // getting the result from model function
        $this->View->Load("Categories_Index",$result);
    }
    /**
    * Will get the view to add category
    */
    public function add()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:../Login_Controller/Login");
    	
    	$this->View->Load("Navbar");
    	$this->View->Load("Add_Category");
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
    	$this->Model->add_category($cat_name,$cat_description,$cat_is_active,$cat_created_by);
    	header("Location:".BASE_URL."Categories_Controller/Categories");
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
    	$this->Model->edit_category($cat_name,$cat_description,$cat_id);
    }
   
}
?>