<?php 


$req = $bdd->prepare('SELECT  ville, pays, passion FROM membre WHERE id=?');

			$req->execute(array($_SESSION['id']));	
			$info = $req->fetch();
			if (!$info['ville']==null){
						
						echo 'ville :'. $info['ville'].'</br>' ;
						echo 'Pays :'. $info['pays'].'</br>' ;
						echo 'Passion :'. $info['passion'].'</br>' ;
											

					}else
					{						
						include'vue/profil_info.php';

					}
			
		
		
		     	

?>