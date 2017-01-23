<?php
session_start();
class ControllerFactory{
 
    public function __construct() {
       
    }
    /*
     * getController method , call when there is request for a specific controller by url 
     * load controller/method if method is
     * provided , otherwise laod controller/index,  --> not implemented yet
     * if url don't have controller then load LoginController/index by default
     * @parms String $contName  specify controller name 
     * @parms String $method specify method name 
     * @parms String $parms  specify list of parameters  
     * @return void 
     *  
     */
    public function getController($contName, $method="", $parms=""){
        if($method==""){
       
            //$contName->index();
            echo "Nothing Found";
        }
        else
        {
            if($parms==""){
                $contName->$method();
            }
            else
            {
                $contName->$method($parms);
            }
        }
    }
}

$url = $_SERVER['REQUEST_URI'];
if ($url=="")
{
	// Enter code here
}
 else
{
      $url = explode("/", $_SERVER['REQUEST_URI']);
      if($url[1]!="")
      {
          if($url[2]!="")
          {
              include_once 'Controllers/'.$url[2].'.php';
              if(isset($url[2]) && isset($url[3]) && isset($url[4]))
              {
                  ControllerFactory::getController(new $url[2](),$url[3],$url[4]);
              }
              else if(isset($url[2]) && isset($url[3]))
              {
                  ControllerFactory::getController(new $url[2](),$url[3]);
              }
          }
          else
          {
             echo "Hello";
          }    
      }
      else
      {
      	$url = explode("/", $_SERVER['REQUEST_URI']);
      	print_r($url);
      }
}
?>