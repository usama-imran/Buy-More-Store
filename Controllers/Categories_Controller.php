<?php
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories_Controller extends Admin_Controller
{
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function categories()
    {
        $result = $this->Model->categories(); // getting the result from model function
        $this->result = $result;
    }
    /**
    * Will get the view to add category
    */
    public function add_categories()
    {
    	
    }
    /**
     * Will add the row category
     * @return void
     */
    public function add_category($args)
    {
    	$this->Model->add_category($args['name'],$args['description'],$args['is_active'],$args['created_by']);
    	header("Location:".BASE_URL."Categories_Controller/Categories");
    }
    /**
     * Will edit the row
     * @return void
     */
    function edit_category($args)
    {
    	$this->Model->edit_category($args['cat_name'],$args['cat_description'],$args['cat_id']);
    }
   
}
