<?php 


		$auteur= htmlspecialchars ($_SESSION['nom_utilisateur']);
		$commentaire= htmlspecialchars ($_POST['commentaire']);
		$id_billet= htmlspecialchars ($_GET['billet']);
		
		$req = $bdd->prepare('INSERT INTO commentaires(id_billet, auteur, commentaire, date_creation) VALUES(:id_billet, :auteur, :commentaire, NOW())');

		$req->execute(array(
			'id_billet' => $id_billet,
			'auteur' => $auteur,
			'commentaire' => $commentaire,
			
			
			));
?>