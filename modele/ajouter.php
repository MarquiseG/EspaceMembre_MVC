<?php
		
			session_start();
		
		//récupération des données
			$nom_utilisateur=$_POST['nom_utilisateur'];
			$mot_de_passe=$_POST['mot_de_passe'];
			// Hachage du mot de passe
			$pass_hache = sha1($_POST['mot_de_passe']);
			$adresse_email=$_POST['adresse_email'];
		
		//vérification des informations 		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
			$lesErreurs = array();		
    
				
		   
	   if (empty($_POST["nom_utilisateur"])) {
		 $lesErreurs[] = "Nom d'utilisateur est obligatoire";
		 // header('Location:vue/formulaire_inscription.php');
			
	   } else {
		   if (strlen($_POST["nom_utilisateur"])>20 || strlen($_POST["nom_utilisateur"])<4){
					$lesErreurs[]="La longueur du nom_utilisateur  est incorrect";
				}else{
		   
				$nom_utilisateur = test_input($_POST["nom_utilisateur"]);}
		 
	   }
	   
	    if (empty($_POST["adresse_email"])) {
		 $lesErreurs[] = "Email is required";
	   } else {
		 $adresse_email = test_input($_POST["adresse_email"]);
	   }
	   
	   if (empty($_POST["mot_de_passe"])) {
		 $lesErreurs[] = "mot de passe est obligatoire";
	   }elseif (strlen($_POST["mot_de_passe"])>20 || strlen($_POST["mot_de_passe"])<4)
	   {
				$lesErreurs[]="La longueur du mot de passe est incorrect";
	   }else
		   if (ctype_alnum($_POST['mot_de_passe'])!= true)
			{
					$lesErreurs[]="Le mot de passe doit etre alphanumérique";
				
			 }else {
		 $adresse_email = test_input($_POST["adresse_email"]);
	   }
		
		if ($_POST["mot_de_passe"] != $_POST["confirmer_mot_de_passe"]){
			$lesErreurs[]=" Veuillez reconfirmer le mot de passe";
				
		}
	
	
	}
	
		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		   }
			
		//Ajout des données
		
		if (empty($lesErreurs)){
			


		    $req = $bdd->prepare('INSERT INTO membre(nom_utilisateur, mot_de_passe, hash_validation, adresse_email, date_creation) VALUES(:nom_utilisateur, :mot_de_passe, :hash_validation, :adresse_email, NOW())');

			$req->execute(array(
			'nom_utilisateur' => $nom_utilisateur,
			'mot_de_passe' => $mot_de_passe,
			'hash_validation' => $pass_hache,
			'adresse_email'=>$adresse_email,
			
			
			));
			//Recuperer le ID et le nom d'utilisateur dans une session
			// $resultat = $req->fetch();
				// if(!isset($_SESSION['id'])) 
							// { 
							
							 // $_SESSION['id'] = $resultat['id'];
							 // $_SESSION['nom_utilisateur'] = $nom_utilisateur;
							 
							// }
			//Trouver Last ID
			$stmt = $bdd->query("SELECT LAST_INSERT_ID()");
			$lastId = $stmt->fetch(PDO::FETCH_NUM);
			$lastId = $lastId[0];
			$_SESSION['id'] = $lastId;
				 // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
			if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
				
			{
				
				$x=1;
					// Testons si le fichier n'est pas trop gros
					if ($_FILES['monfichier']['size'] <= 1000000)
					{
							// Testons si l'extension est autorisée
							$infosfichier = pathinfo($_FILES['monfichier']['name']);
							$extension_upload = $infosfichier['extension'];
							$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
							if (in_array($extension_upload, $extensions_autorisees))
							{								
													
									// On peut valider le fichier et le stocker définitivement
									move_uploaded_file($_FILES['monfichier']['tmp_name'], 'avatars/' . basename($lastId) . '.' . $extension_upload );
									
							}
					}
			}
			
			header('Location:index.php?uc=profil');

		}else{
					
						include 'vue/formulaire_inscription.php';
						include'vue/erreur.php';
						



		
		}
?>