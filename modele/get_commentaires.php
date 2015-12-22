<?php
function get_commentaires(){
	global $bdd;
	$id_billet= htmlspecialchars($_GET['billet']);

	$req = $bdd->prepare('SELECT  auteur, commentaire, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_creation, id_billet FROM commentaires WHERE id_billet=?');

	$req->execute(array($id_billet));				
	$commentaires = $req->fetchAll();
		 
	return $commentaires;							

}								
?>