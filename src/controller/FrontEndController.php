<?php
require_once('vendor/smarty/smarty/libs/Smarty.class.php');
require_once('./src/model/Database.php');


class FrontEndController
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

	public function pageNotFound() {

		// Assignation des variables du bloc central
		$this->_smarty->assign(array(
		    "titre_page" => "Page 404",
		    "bloc_central" => "src/view/bloc_central_404.html",
		    "bloc_indentification" => "src/view/bloc_identification_logedout.html"
		));

		// On affiche la page
		$this->_smarty->display("src/view/template.html");
	}

	public function homePage() {
		// Assignation des variables du bloc central
		$this->_smarty->assign(array(
		    "titre_page" => "Accueil",
		    "bloc_central" => "src/view/bloc_central_accueil.html",
		    "bloc_indentification" => "src/view/bloc_identification_logedout.html"
		));

		// On affiche la page
		$this->_smarty->display("src/view/template.html");
	}

	public function detailsPathologie($idPatho){

		$patho = $this->_db->getPatho($idPatho);
		$details = $this->_db->getDetails($idPatho);

		if(is_null($details) || empty($details)) {
			$this->pageNotFound();
		}
		else {
			// Assignation des variables du bloc central
			$this->_smarty->assign(array(
			    "titre_page" => $patho["description"],
			    "bloc_central" => "src/view/bloc_central_detail.html",
			    "bloc_indentification" => "src/view/bloc_identification_logedout.html",
					"details" => $details,
					"patho" => $patho
			));

			// On affiche la page
			$this->_smarty->display("src/view/template.html");
		}
	}
}
?>
