<?php 



			$titre=$_POST['titre'];
			$contenu=$_POST['contenu'];
			
		    $req = $bdd->prepare('INSERT INTO billets(id_membre, titre, contenu, date_creation) VALUES( :id_membre, :titre, :contenu, NOW())');
			$req->execute(array(
			'id_membre'=>$_SESSION['id'],
			'titre' => $titre,
			'contenu' => $contenu,
			
			
			));
?>