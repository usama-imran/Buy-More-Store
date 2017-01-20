<?php
include("Path/include.php");
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Categories_Controller
{
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    function categories()
    {
        $data = array();
        require_once 'Model/category_model.php';
        $obj = new Category();
        $result = $obj->get_category(); // getting the result from model function
        foreach ($result as $value)
        {
            $data[] = $value;	
        }
        return $data;
    }
   
}
?>