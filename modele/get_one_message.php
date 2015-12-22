<?php 
	function get_one_sujet()
{
		global $bdd;
		$reponse = $bdd->query('SELECT titre, contenu, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_creation, id FROM billets');
		$sujets = $reponse->fetchAll();
		 
		 return $sujets;
}
?>