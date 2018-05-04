<?php
	//error_reporting(-1);
	$pageRoute = isset($_GET['page']) ? $_GET['page'] : null;
	$route = "/";
	if($pageRoute != null && !empty($pageRoute)) {
		switch($pageRoute) {
			case "accueil" : {
				$route .= "accueil";
				break;
			}
			case "criteres" : {
				$route .= "criteres";
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
		$route .= "accueil";
	}
	
	$includeFile = "./src/view".$route.".php";
	//echo($includeFile);
	
	include($includeFile);
?>