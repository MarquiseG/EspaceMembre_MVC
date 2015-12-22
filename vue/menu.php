<?php 
if (isset($_SESSION['id']) AND isset($_SESSION['nom_utilisateur']))
{
    echo 'Bonjour ' . $_SESSION['nom_utilisateur'].'</br>';
	}
	    // echo 'Bonjour ' . $_SESSION['nom_utilisateur'].'</br>';

?>

						<!--Nav bar!-->		
		    <div id="home" class="header">
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="container" >
					<div class="navbar-header">   
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="sr-only"> Toggle Navigation </span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						  <a class="navbar-brand" href="#">My Space</a>
					</div>
					
					<div class="collapse navbar-collapse">
					  <ul class="nav navbar-nav  navbar-right">
						<li class="active"> <a href="index.php" class="scroll">Accueil</a> </li>
						<?php
						if (isset($_SESSION['id'])){
						?>
						<li> <a href="index.php?uc=forum&action=voir_Forum" class="scroll">Forum</a> </li>
						<li> <a href="index.php?uc=deconnexion" class="scroll">Se deconnecter</a> </li>
					     <a href="index.php?uc=profil" class="scroll"><?php echo $_SESSION['nom_utilisateur']?></a>
						<?php
						}
						?>
					  </ul>
					  
				</div>
				</div>
			</nav>
			</div>



