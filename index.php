<?php
	//error_reporting(-1);
	$pageRoute = $_GET['page'];
	echo($pageRoute);
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
				$route .= "page-404";
			}
		}
	}
	else {
		echo("accueil");
	}
	
	echo($route);
	
	phpinfo();
?>