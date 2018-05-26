<?php
require('./src/model/Database.php'); 


class RestController
{
	private $_db;

	public function __construct(){
		$this->_db = new Database();
  	}

	public function listPathologie(){
		
	}
}
?>