<?php
require_once('./src/model/Database.php');


class RestController
{
	private $_db;

	public function __construct(){
		$this->_db = new Database();
  	}

	public function detailsPathologie($idPatho){
		$details = $this->_db->getDetails($idPatho);

		echo json_encode($details);
	}
}
?>
