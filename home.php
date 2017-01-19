<?php
class ControllerFactory{
 
    public function __construct() {
       
    }
    /*
     * getController method , call when there is request for a specific controller by url 
     * load controller/method if method is
     * provided , otherwise laod controller/index, 
     * if url don't have controller then load LoginController/index by default
     * @parms IController $contName  specify controller name 
     * @parms String $method specify method name 
     * @parms String $parms  specify list of parameters  
     * @return nothing to return , 
     *  
     */
    public function getController(IController $contName, $method="", $parms=""){
        if($method==""){
       
            $contName->index();
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
    /*
     * loadControllerByName method , call when there is request from a controller for a specific controller by url 
     * load controller/method if method is
     * provided , otherwise laod controller/index, 
     * if  don't have controller name then load NotFoundController/index by default
     * @parms String $contName  specify controller name 
     * @parms String $method specify method name 
     * @parms String $parms  specify list of parameters  
     * @return nothing to return , 
     *  
     */
   public function loadControllerByName($contName, $method="", $parms="")
	{
      if ($contName!=null){
        if($method==""){
            try{
                //$obj=new $contName();
                //$obj->index();
               header('Location: /POS2/'.$contName.'/index');
            }  catch (Exception $e){
               
                 header('Location: /POS2/NotFoundController/index');
            }
        }
        else
        {
            if($parms==""){
                 header('Location: /POS2/'.$contName.'/'.$method);
            }
            else
            {
                 $obj->$method($parms);
            }
        }
      }
      else
      {
          $obj=new NotFoundController();
          $obj->index();
      }
	}
}

$url = $_SERVER['REQUEST_URI'];
if ($url==""){
    //ControllerFactory::getController(new LoginController());
	
}
 else
{
      $url = explode("/", $_SERVER['REQUEST_URI']);
      if($url[0]!="")
      {
          if($url[1]!="")
          {
              include_once 'Controllers/'.$url[2].'.php';
              if($url[2]!=""){
                  ControllerFactory::getController(new $url[0](),$url[1],$url[2]);
              }
              else
              {
                  ControllerFactory::getController(new $url[0](),$url[1]);
              }
          }
          else
          {
              ControllerFactory::getController(new $url[0]());
          }    
      }
      else
      {
           //ControllerFactory::getController(new LoginController());
      	$url = explode("/", $_SERVER['REQUEST_URI']);
      	print_r($url);
      }
}
?>