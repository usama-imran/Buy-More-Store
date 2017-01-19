<?php
class Categories
{
    private $method_name;

    public function __construct($method)
    {
        $this->method_name = $method;
    }
    
    public function get_categories()
    {
        return $this->method_name;
    }
}

class Categories_Factory
{
    public static function get_method($method)
    {
        return new Categories($method);
    }
}

// have the factory create the Automobile object
$obj = Categories_Factory::get_method('get_categories');

print_r($obj->get_categories()); // outputs "Bugatti Veyron"
?>