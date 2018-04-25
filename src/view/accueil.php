<?php
// On inclut la classe Smarty
require('../../vendor/smarty/smarty/libs/Smarty.class.php'); 
// Instanciaton de l'objet smarty
$smarty = new Smarty();

// Assignation des variables du bloc central
$smarty->assign(array(
    "titre_page" => "Accueil",
    "bloc_central" => "bloc_central_accueil.html",
    "bloc_indentification" => "bloc_identification_logedout.html"
));

// On affiche la page d'accueil
$smarty->display("template.html");

?>