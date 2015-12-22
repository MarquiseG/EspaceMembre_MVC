<?php
$action = $_REQUEST['action'];

switch($action){
	case 's_inscrire':
	{include("modele/ajouter.php"); break;} 
	case 'se_connecter' :
    {include("modele/seconnecter.php"); break;} 
	case 'profil_post' :
    {include("modele/profil_post.php"); break;} 
	
	
}
?>