<?php
session_start();

include_once('modele/connexion_sql.php');
include_once('vue/entete.php') ;
include_once('vue/menu.php') ;

if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
	$uc = $_REQUEST['uc'];

switch($uc){
	case 'accueil':
	{include("vue/accueil.php"); break;} 
	case 'inscription' :
    {include("vue/formulaire_inscription.php"); break;} 
	case 'gestionBlog':
	{include("controleur/c_gestionBlog.php"); break;}
	case 'connexion' :
	{ include ("vue/connexion.php"); break;}
	case 'deconnexion':
	{ include ("vue/sedeconnecter.php"); break;}
	case 'profil':
	{ include ("vue/profil.php"); break;}
	case 'forum':
	{ include ("controleur/c_forum.php"); break;}
}

include_once('vue/pied_de_page.php') ;

?>