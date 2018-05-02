<?php
// On inclut la classe Smarty
require('../../vendor/smarty/smarty/libs/Smarty.class.php'); 
// Instanciaton de l'objet smarty
$smarty = new Smarty();

// Assignation des variables du bloc central
$smarty->assign(array(
    "titre_page" => "Informations",
    "bloc_central" => "bloc_central_informations.html",
    "bloc_indentification" => "bloc_identification_logedout.html"
));

// On affiche la page d'accueil
$smarty->display("template.html");

?>
