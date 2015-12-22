<?php
function get_sujets()
{
		global $bdd;
		$nombre_de_message_par_page=2;
		$reponse=$bdd->query('SELECT COUNT(*) AS contenu FROM billets');
		$total_messages = $reponse->fetch();
		$nombre_messages=$total_messages['contenu'];
		$nb_pages=ceil($nombre_messages/$nombre_de_message_par_page);
						
						echo 'Page : ';
						for($i=1; $i <= $nb_pages; $i++){
					
						 echo '<a href="index.php?uc=forum&action=voir_Forum&page=' .$i .'">' .$i .'</a>';
						
						}
						
						if(isset($_GET['page'])){
							
							$page=$_GET['page'];
							
						
						}
						else{
							
							$page=1;
							
						}
		$premierMessageAafficher= ($page-1)*$nombre_de_message_par_page;
	    $reponse->closeCursor();
		$reponse = $bdd->query('SELECT titre, contenu, DATE_FORMAT(date_creation,"%d/%m/%Y %Hh%imin%ss") AS date_creation, id FROM billets ORDER BY id DESC LIMIT ' . $premierMessageAafficher . ', ' . $nombre_de_message_par_page);
		$sujets = $reponse->fetchAll();
		 
		 return $sujets;
		 
}

?>
