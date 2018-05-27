<?php
	//error_reporting(-1);
	include("./src/controller/RestController.php");
	$controllerRest = new RestController();

	include("./src/controller/FrontEndController.php");
	$controller = new FrontEndController();

	$getPageRoute = isset($_GET['page']) ? $_GET['page'] : null;
	$getId = isset($_GET['id']) ? $_GET['id'] : null;
	$route = "/";

	//code de réponse http par défaut 200
	http_response_code(200);

	if($getPageRoute != null && !empty($getPageRoute)) {
		switch($getPageRoute) {
			case "accueil" : {
				$route .= "accueil";
				break;
			}
			case "criteres" : {
				$route .= "criteres";
				break;
			}
			case "pathologie" : {
				// $route .= "pathologie";
				$controller->listPathologie();
				break;
			}
			case "informations" : {
				$route .= "informations";
				break;
			}
			case "logout" : {
				$route .= "logout";
				break;
			}
			case "detail" :{
				if($getId == null) {
					$route .= "page-404";
				}
				else {
			    $idPatho = $getId;
					$controllerRest->detailsPathologie($idPatho);
				}
				break;
			}
			default : {
				$route .= "page-404";
			}
		}
	}
	else {
		$route .= "accueil";
	}

	if($route === "/accueil") {
		$controller->homePage();
	}
	else if($route === "/page-404") {
		http_response_code(404);
		$controller->pageNotFound();
	}
?>
