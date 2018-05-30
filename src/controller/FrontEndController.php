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
		    "titre_page" => "recherche par critères",
		    "bloc_central" => "src/view/bloc_central_pathologie.html",
		    "bloc_indentification" => "src/view/bloc_identification_logedout.html",
		    "pathologies" => $pathos,
		    "meridiens" => $meridiens,
		    "types" => $types
		));

		$this->_smarty->display("src/view/template.html");
	}

	public function creerCompte() {
		$this->displayContentPage(
			"Créer un compte",
			"src/view/bloc_central_creer-compte.html",
			"src/view/bloc_identification_logedout.html"
		);
	}

	public function informationsPage() {
		$this->displayContentPage(
			"Informations",
			"src/view/bloc_central_informations.html",
			"src/view/bloc_identification_logedout.html"
		);
	}

	public function pageNotFound() {
		$this->displayContentPage(
			"Page 404",
			"src/view/bloc_central_404.html",
			"src/view/bloc_identification_logedout.html"
		);
	}

	public function homePage() {
		$this->displayContentPage(
			"Accueil",
			"src/view/bloc_central_accueil.html",
			"src/view/bloc_identification_logedout.html"
		);
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

	public function displayContentPage (
		$titrePage,
		$blocCentral,
		$blocIndentification,
		$template = "src/view/template.html"
	) {

			// Assignation des variables du bloc central
			$this->_smarty->assign(array(
			    "titre_page" => $titrePage,
			    "bloc_central" => $blocCentral,
			    "bloc_indentification" => $blocIndentification
			));

			// On affiche la page
			$this->_smarty->display($template);

	}
	
	// api
	public function getApi() {
		?>
		<pre style="word-wrap: break-word; white-space: pre-wrap;">
			{
				"detailsPathologie" : "api/details/{id}",
				"getPatho" : api/pathologie/{id}
			}
		</pre>
		<?php
	}
}
?>
