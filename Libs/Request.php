<?php

class Request 
{
	private $controller = null,
            $action = null,
            $args = null;

    public function __construct() 
    {
        $this->manage_url();
        if($this->page_exist())
        {
            $this->request();
        } 
        else 
        {
            $error = new Error_Controller();
        }
    }

    private function request()
    {
        $controller = new $this->controller();
        $model = explode("_",$this->controller);
        $controller->load_model($model[0]);
        if(!$this->args){ $controller->{$this->action}(); }
        else
        {
           $count_args = count($this->args);
           switch ($count_args) 
           {
               case 1:
                   $controller->{$this->action}($this->args[0]);
                   break;
               case 2:
                   $controller->{$this->action}($this->args[0], $this->args[1]);
                   break;
               case 3:
                   $controller->{$this->action}($this->args[0], $this->args[1], $this->args[2]);
                   break;
               case 4:
                   $controller->{$this->action}($this->args[0], $this->args[1], $this->args[2], $this->args[3]);
                   break;
           }
        }
    }
	
    /**
     * Get controller, action and parametes
     */
    private function manage_url()
    {
        $uri = isset($_GET['url']) ? $_GET['url'] : null;;
        $uri = trim($uri, '/');
        $this->remove_query_or_hash($uri);
        $exploded_uri = explode('/', $uri);
        $this->controller = $exploded_uri[0];
        $this->action = $exploded_uri[1];
        $this->args = array_slice($exploded_uri, 2);
    }
	
    private function get_controller()
    {
    	return $this->controller;
    }
    
    private function get_action()
    {
    	return $this->action;
    }
    
    private function get_args()
    {
    	return $this->args;
    }
    
    private function remove_query_or_hash(&$uri)
    {
        $query = strpos($uri, '?');
        $hash = strpos($uri, '#');
        if($query!==FALSE||$hash!==FALSE)
        {
            $idx =  $query < $hash ? $hash : $query;
            $uri = substr($uri, 0, $idx);
        }
    }

    private function page_exist()
    {
    	$controller = class_exists($this->controller);
        $method = method_exists($this->controller, $this->action);
        if(!$controller||!$method)
        {
            return FALSE;
        }
        return TRUE;
    }
}