<?php
	//error_reporting(-1);
	$pageRoute = $_GET['page'];
	$route = "/";
	if(isset($pageRoute) && !empty($pageRoute)) {
		switch($pageRoute) {
			case "accueil" : {
				$route .= "accueil";
				break;
			}
			case "critere" : {
				$route .= "critere";
				break;
			}
			case "pathologie" : {
				$route .= "pathologie";
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
			default : {
				$route .= "accueil";
			}
		}
	}
	else {
		echo("accueil");
	}
	
	echo($route);
?>