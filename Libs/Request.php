<?php
/**
 * Will manage the URL Request, Get Controller & Action name, Get the parameters. 
 * @author Usama
 *
 */
class Request 
{
	public $controller = null,
            $action = null,
            $args = null;
	/**
	 * Will fire up the initial methods needed to manage the url
	 */
    public function __construct() 
    {	
        $this->manage_url();
    }

    /**
     * Get controller, action and parametes
     * @return void
     */
    private function manage_url()
    {
        $uri = isset($_GET['url']) ? $_GET['url'] : null;
        $uri = trim($uri, '/');
        $this->remove_query_or_hash($uri);
        $exploded_uri = explode('/', $uri);
        if(isset($exploded_uri[0])){
        	$this->controller = $exploded_uri[0];
        }
        if(isset($exploded_uri[1])){
        	$this->action = $exploded_uri[1];
        }
        $this->args = array_slice($exploded_uri, 2);
    }
	/**
	 * Will return the name of the controller
	 * @return string $controller
	 */
    public function get_controller()
    {
    	return $this->controller;
    }
    /**
     * Will return the name of the method to be called
     * @return string $action
     */
    public function get_action()
    {
    	return $this->action;
    }
    /**
     * Will return the arguments to be passed to a method
     * @return array $arguments
     */
    public function get_args()
    {
    	return $this->args;
    }
    /**
     * Will remove query or hash from the uri
     * @param string $uri
     */
    private function remove_query_or_hash(&$uri)
    {
        $query = strpos($uri, '?');
        $hash = strpos($uri, '#');
        if($query!==false||$hash!==false)
        {
            $idx =  $query < $hash ? $hash : $query;
            $uri = substr($uri, 0, $idx);
        }
    }
	/**
	 * Check if the requested page exists or not.
	 * @return boolean
	 */
    public function page_exist()
    {
    	$controller = class_exists($this->controller);
        $method = method_exists($this->controller, $this->action);
        if(!$controller||!$method)
        {
            return false;
        }
        return true;
    }
}