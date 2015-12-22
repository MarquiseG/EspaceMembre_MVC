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
$req = $bdd->prepare('INSERT INTO membre(ville, pays,passion) VALUES(:ville, :pays, :passion) WHERE id=:id');

			$req->execute(array(
			'ville' => $ville,
			'pays' => $pays,
			'passion' => $passion,
			'id'=>$_SESSION['id'],
				
			));

?>