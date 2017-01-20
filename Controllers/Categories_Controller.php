<?php
require_once 'config.php';
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
    function categories()
    {
        $data = array();
        $obj = new Category();
        $result = $obj->categories(); // getting the result from model function
        require_once 'Views/Admin/categories_index.php';
        return  $result;
    }
   
}
?>