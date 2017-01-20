<?php
require_once 'Models/Products_Model.php';
require_once 'Models/Categories_Model.php';
/**
* Class holding all the CRUD operations of Categories on Controller level 
*/
class Products_Controller
{
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function products()
    {
        $obj = new Products_Model();
        $result = $obj->products(); // getting the result from model function
        require_once 'Views/Admin/products_index.php';
    }
    /**
    * Will get the view to add category
    */
    public function add()
    {
    	$pro_obj = new Products_Model();
    	$cat_obj = new Category_Model();
    	$products = $pro_obj->products();
    	$categories = $cat_obj->categories();
    	require_once 'Views/Admin/Add_Product.php';
    }
    /**
     * Will add the row category
     * @return void
     */
    public function add_product()
    {//getting the details of the immage and moving it to the uploads folder
        $product_image = "No Image";
        $target_path = "Sources/Images/";
        $target_path = $target_path.basename( $_FILES['pro_image']['name']);
        move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_path); // image moved to uploads folder
        $product_image= $_FILES['pro_image']['name']; //will store the name of the image in a variable
        //getting the input fields posted from the form
        $product_name = $_REQUEST['name'];
        $product_price = $_REQUEST['price'];
        $product_description = $_REQUEST['description'];
        $product_category = $_REQUEST['category'];
        $product_is_active = $_REQUEST['is_active'];
        $product_created_by = $_REQUEST['created_by'];
        $product_quantity = $_REQUEST['quantity'];
        // Model object creation to call the model function of inserting the data
        $product_obj = new Products_Model();
        $response =$product_obj->add_product($product_name,$product_price,$product_image,$product_quantity,$product_description,$product_category,$product_is_active,$product_created_by);
        //chek if there are any associated products. by default it will be 0
        $associated_product_enable = $_REQUEST['associated_product_enable'];
        // if there are associated products than this function
        if($associated_product_enable == 1)
        {
            $associated_product_id = $_REQUEST['associated_product'];
            $associated_product_obj = new Associated_Product();
            $associated_product_obj->create_associated_product($associated_product_id);
        }
        header("Location:Products");
    }
    public function edit()
    {
    	
    }
    /**
     * Will edit the row
     * @return void
     */
    function edit_products()
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