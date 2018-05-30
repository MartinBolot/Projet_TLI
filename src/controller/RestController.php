<?php
require_once('./src/model/Database.php');


class RestController
{
	private $_db;

	public function __construct(){
		$this->_db = new Database();
	}

	// api/details/{id}
	public function detailsPathologie($idPatho) {
		$details = $this->_db->getDetails($idPatho);
		echo json_encode($details);
	}

	// api/pathologie/{id}
	public function getPatho($idPatho) {
		$patho = $this->_db->getPatho($idPatho);
		echo json_encode($patho);
	}

	// api/criteres/{keyword}
	public function getPathosFromKeyword($keyword) {
		$pathos = $this->_db->getPathosFromKeyword($keyword);
		echo json_encode($pathos);
	}

	public function pageNotFound() {
		echo json_encode("");
	}
}
?>
