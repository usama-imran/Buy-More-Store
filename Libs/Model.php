<?php
/**
 * Will establish a connection to the database.
 * @author Usama
 *
 */
class Model
{
	public $conn;
	
	public function __construct()
	{
		$db= Database::getInstance();
		$this->conn=$db->getConnection();
	}
}