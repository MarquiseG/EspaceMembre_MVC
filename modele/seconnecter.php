<?php
		
		
		
			session_start();
				//vérification des informations 	

			if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
				$lesErreurs = array();
					
			   function test_input($data) {
			   $data = trim($data);
			   $data = stripslashes($data);
			   $data = htmlspecialchars($data);
			   return $data;
		   }
		   if (empty($_POST["nom_utilisateur"])) {
				 $lesErreurs[] = "Nom d'utilisateur est obligatoire";

		   } else {
				 $nom_utilisateur = test_input($_POST["nom_utilisateur"]);
			 
		   }
		   
		    if (empty($_POST["mot_de_passe"])) {
				 $lesErreurs[] = "Le mot de passe est obligatoire";
				 // if($_POST["mot_de_passe"])
					 // (strlen( $_POST['phpro_username']) > 20 || strlen($_POST['phpro_username']) < 4)

		   } else {
				$mot_de_passe = $_POST["mot_de_passe"];
				$mot_de_passe_hash= sha1($mot_de_passe);

			 
		   }
			
		
		// Verfication existance dans la base de données
		
		if (empty($lesErreurs)){
			
			 $req = $bdd->prepare('SELECT id, nom_utilisateur, hash_validation FROM membre WHERE nom_utilisateur=? AND hash_validation=?');

			$req->execute(array($nom_utilisateur,$mot_de_passe_hash));	
					$resultat = $req->fetch();
					
				
					
					if ($resultat){
						
						if(!isset($_SESSION['id'])) 
							{ 
							
							 $_SESSION['id'] = $resultat['id'];
							 $_SESSION['nom_utilisateur'] = $nom_utilisateur;
							 
							}
							
							// echo " Vous êtes connecté".'</br>' ;
											header('Location:index.php?uc=profil');

					}else
					{						
						echo "Mot de passe ou nom d'utilisateur est éronné ";
						header('Location:index.php?uc=connexion');
					}
					
		}else{
				include'vue/connexion.php';

				include'vue/erreur.php';
		
			}
			
			}
?>