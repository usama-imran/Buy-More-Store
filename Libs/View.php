<?php
/**
 * 
 * @author Usama
 * Class will have the method for loading the views called by the controller. 
 */
class View
{
	/**
	 * Will load the view
	 * @param string $name Will be the name of the view
	 * @param array $result will be the data sent to the view
	 */
	public function load($name,$result = null)
	{
		if(isset($_SESSION['user']) || !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
			require_once BASE_PATH.'/Views/Page_Header.php';
		} elseif (isset($_SESSION['admin'])) {
			require_once BASE_PATH.'/Views/Navbar.php';
		}
		require_once BASE_PATH.'/Views/'.$name.'.php';
		if(isset($_SESSION['user']) || !isset($_SESSION['user']) && !isset($_SESSION['admin'])) {
			require_once BASE_PATH.'/Views/Footer.php';
		}
	}
}