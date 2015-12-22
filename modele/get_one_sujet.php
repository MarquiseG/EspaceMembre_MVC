<?php 
	function get_one_sujet()
{
		global $bdd;
		$id_billet= htmlspecialchars($_GET['billet']);

		$reponse = $bdd->prepare('SELECT titre, contenu, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_creation, id FROM billets WHERE id=?');
		$reponse->execute(array($id_billet));		
		$sujets = $reponse->fetchAll();
		 
		 return $sujets;
}
?>