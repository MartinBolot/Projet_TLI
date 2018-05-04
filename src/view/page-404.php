<?php
// On inclut la classe Smarty
require('vendor/smarty/smarty/libs/Smarty.class.php'); 
// Instanciaton de l'objet smarty
$smarty = new Smarty();

// Assignation des variables du bloc central
$smarty->assign(array(
    "titre_page" => "Page 404",
    "bloc_central" => "src/view/bloc_central_404.html",
    "bloc_indentification" => "src/view/bloc_identification_logedout.html"
));

// On affiche la page d'accueil
$smarty->display("src/view/template.html");

?>
