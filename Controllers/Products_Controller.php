<?php
/**
 * Will handle populating the products along with the CRUD operation performed on it. 
 * @todo Changes required, Cat Model Not Loaded. 
 * @author Usama
 *
 */
class Products_Controller extends Admin_Controller
{
	private $cat_model_obj;
	
	public function __construct()
	{
		parent::__construct();
		$this->cat_model_obj= new Categories_Model();
	}
    /**
    * Will get a list of all the categories from the database
    * @return $data 
    */
    public function products()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:".BASE_URL."Login_Controller/Login");
    	
        $result = $this->Model->products(); // getting the result from model function
        $this->result = $result;
    }
    /**
    * Will get the view to add category
    */
    public function add_products()
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:../Login_Controller/Login");
    	
    	$products = $this->Model->products();
//     	$categories = $this->cat_model_obj->categories();
    }
    /**
     * Will add the row category.
     * @todo Manage associated products.
     * @param array $args.
     * @return void
     */
    public function add_product($args)
    {
    	//getting the details of the immage and moving it to the uploads folder
        $product_image = "No Image";
        $target_path = "Public/Images/";
        $target_path = $target_path.basename( $_FILES['pro_image']['name']);
        move_uploaded_file($_FILES['pro_image']['tmp_name'], $target_path); // image moved to uploads folder
        $product_image= $_FILES['pro_image']['name']; //will store the name of the image in a variable
        //getting the input fields posted from the form
        print_r($args);
        $this->Model->add_product($args['name'],$args['price'],$product_image,$args['quantity'],
        		$args['description'],$args['category'],$args['is_active'],$args['created_by']);
//         if($args['associated_product_enable'] == 1) {
//             $associated_product_obj = new Associated_Product();
//             $associated_product_obj->create_associated_product($args['associated_product']);
//         }
        header("Location:".BASE_URL."Products_Controller/Products");
    }
    
    /**
     * Will populate the edit view with product information
     * @param array $id
     */
    public function edit_products($id)
    {
    	if(!isset($_SESSION['admin']))
    		header("Location:".BASE_URL."Login_Controller/Login");
    	
    	$products = $this->Model->products();
    	//$categories = $this->cat_model_obj->categories();
    	$product_detail = $this->Model->edit($id[0]);
    	foreach ($product_detail as $pro_form_var)
    	{
    		$items = array($pro_form_var);
    	}
    	$this->result = $items;
    }
    /**
     * Will edit the row
     * @param array $args
     * @return void
     */
    public function edit_product($args)
    {
    	$this->pro_model_obj->edit_product($args ['product_id'],$args ['name'],$args ['price'],$args ['quantity'],
		$args ['description'],$args ['category'],$args ['is_active']);
    	header("Location:".BASE_URL."Products_Controller/Products");
    }
   
}
