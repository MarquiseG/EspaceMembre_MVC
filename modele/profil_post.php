<?php
session_start();

// REcupérer les données
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $ville = test_input($_POST["ville"]);
   $pays = test_input($_POST["pays"]);
   $passion = test_input($_POST["passion"]);
   
}	
function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		   }
//Ajouter les informations complémentaires
$req = $bdd->prepare('UPDATE membre SET  ville=?, pays=?,  passion=?  WHERE id= ?');

$req->execute(array($ville,$pays,$passion, $_SESSION['id']));

// Puis rediriger vers profil.php comme ceci :
header('Location:index.php?uc=profil');

			?>