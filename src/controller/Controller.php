<?php
require('vendor/smarty/smarty/libs/Smarty.class.php'); 
require('./src/model/Database.php'); 


class Controller
{
	private $_smarty;
	private $_db;

	public function __construct(){
		$this->_smarty = new Smarty();
		$this->_db = new Database();
  	}

	public function listPathologie(){
		$pathos = $this->_db->select(["*"], "patho")->toArray();
		$meridiens = $this->_db->select(["code", "nom"], "meridien")->toArray();
		$types = $this->_db->selectDistinct(["type"], "patho")->toArray();

		$this->_smarty->assign(array(
		    "titre_page" => "Recherche par pathologie",
		    "bloc_central" => "src/view/bloc_central_pathologie.html",
		    "bloc_indentification" => "src/view/bloc_identification_logedout.html",
		    "pathologies" => $pathos,
		    "meridiens" => $meridiens,
		    "types" => $types
		));

		$this->_smarty->display("src/view/template.html");
	}
}
?>