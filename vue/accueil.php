
				
		<h3>Espace membre</h3>
		<?php
		if (isset($_SESSION['id'])){
			
			echo "Vous êtes connecté";
		}else
		  {
		?>
		<ul>
			<li><a href="index.php?uc=inscription">Inscription</a></li>
		</ul>
		<ul>
		
			<li> <a href="index.php?uc=connexion"> se connecter </a></li>
		</ul>
		<?php
		  }
		?>
		