<?php
$action = $_REQUEST['action'];


switch($action){
	case 'voir_Forum':
	{   
		//Recupérer les données de la basse de données (modèle)
		include ("modele/get_sujets.php");
		$sujets = get_sujets();
		if (!$sujets){
					
				echo "il ya aucun sujet";
		}else{
				
				 //afficher les sujets du forum (Modele) 
				 include("vue/afficher_sujets.php"); 
		}
		//Afficher le formulaire pour l'ajout des données (vue)
		include("vue/formulaire_sujet.php");
		break;} 
	
	case 'add_sujet':	
	{
		//Ajouter les données dans la base de données (modèle)
	include("modele/add_sujet.php");
	//Recupérer les données de la basse de données (modèle)
	include ("modele/get_sujets.php");
	$sujets = get_sujets();

     //  afficher les sujets du forum (Modele) 
	include("vue/afficher_sujets.php");
	//Afficher le formulaire pour l'ajout des données (vue)
	include("vue/formulaire_sujet.php");
	break;} 
	
	case 'commentaires':
	{
		//Recupérer les données de la basse de données (modèle)
		include("modele/get_commentaires.php");
	   $commentaires=get_commentaires();
		
		if (!$commentaires){
					
				echo "il ya aucun commentaire";
		}else{				
				// Afficher le sujet 
				include ("modele/get_one_sujet.php");
				$sujets=get_one_sujet();
				//  afficher les sujets du forum (vue) 
					include("vue/afficher_sujets.php");
				 // afficher les commentaires du sujet (Modele) 
				 include("vue/afficher_commentaires.php"); 
		}
		//Afficher le formulaire pour l'ajout des données (vue)
		
		include("vue/form_commentaire.php");
		break;
		
		
		
	}
	
	case 'add_commentaire':	
	{
		//Ajouter les données dans la base de données (modèle)
	include("modele/add_commentaire.php");
	
	//Recupérer les données de la basse de données (modèle)
	include ("modele/get_commentaires.php");
	$commentaires=get_commentaires();

     //  afficher les sujets du forum (Modele) 
	include("vue/afficher_commentaires.php");
	//Afficher le formulaire pour l'ajout des données (vue)
	include("vue/form_commentaire.php");
	break;} 
}


?>