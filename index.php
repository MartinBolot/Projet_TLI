<?php
	//error_reporting(-1);
	include("./src/controller/RestController.php");
	$controllerRest = new RestController();

	include("./src/controller/FrontEndController.php");
	$controller = new FrontEndController();

	$getPageRoute = isset($_GET['page']) ? $_GET['page'] : null;
	$getAPIRoute = isset($_GET['api']) ? $_GET['api'] : null;
	$getId = isset($_GET['id']) ? $_GET['id'] : null;
	$getKeyWord = isset($_GET['keyword']) ? $_GET['keyword'] : null;
	$route = "";
	$API = "";

	//code de réponse http par défaut 200
	http_response_code(200);

	if($getPageRoute != null && !empty($getPageRoute)) {
		$route = setRoute($getPageRoute, $getId, $controller);
	}
	else if($getAPIRoute != null && !empty($getAPIRoute)) {
		$API = setAPI($getAPIRoute, $getId, $getKeyWord, $controllerRest);
	}
	else {
		$route = "accueil";
	}

	if($route === "accueil") {
		$controller->homePage();
	}
	else if($route === "page-404" || $API === "page-404") {
		http_response_code(404);
		if($route === "page-404") {
			$controller->pageNotFound();
		}
		else if($API === "page-404") {
			$controllerRest->pageNotFound();
		}
	}

	function setRoute($getRoute, $id, $controller) {
		$route = "";
		switch($getRoute) {
			case "accueil" : {
				$route = "accueil";
				break;
			}
			case "criteres" : {
				$route = "criteres";
				break;
			}
			case "pathologies" : {
				$route = "pathologies";
				$controller->listPathologie();
				break;
			}
			case "symptomes" : {
				$route = "symptomes";
				$controller->listSymptomes();
				break;
			}
			case "informations" : {
				$route = "informations";
				$controller->informationsPage();
				break;
			}
			case "logout" : {
				$route = "logout";
				break;
			}
			case "detail" :{
				if(is_null($id)) {
					$route = "page-404";
				}
				else {
					$route = "detail";
			    $idPatho = $id;
					$controller->detailsPathologie($idPatho);
				}
				break;
			}
			case "creer-compte" : {
				$route = "creer-compte";
				$controller->creerCompte();
				break;
			}
			case "api" : {
				$route = "api";
				$controller->getApi();
				break;
			}
			default : {
				$route = "page-404";
			}
		}
		return $route;
	}

	// gestion de l'api
	function setAPI($getAPI, $id, $keyword, $controller) {
		$api = "";
		switch($getAPI) {
			case "details" : {
				if(is_null($id)) {
					$api = "page-404";
				}
				else {
					$api = "details";
					$idPatho = $id;
					$controller->detailsPathologie($idPatho);
				}
				break;
			}
			case "pathologie" : {
				if(is_null($id)) {
					$api = "page-404";
				}
				else {
					$api = "pathologie";
					$idPatho = $id;
					$controller->getPatho($idPatho);
				}
				break;
			}
			case "criteres" : {
				if(is_null($keyword)) {
					$api = "page-404";
				}
				else {
					$api = "criteres";
					$controller->getPathosFromKeyword($keyword);
				}
				break;
			}
			default : {
				$api = "page-404";
			}
		}
		return $api;
	}

?>
