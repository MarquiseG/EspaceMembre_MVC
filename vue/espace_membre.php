<?php 
if (isset($_SESSION['id']))
{
    echo 'Bonjour ' . $_SESSION['nom_utilisateur'];
}
?>

<div style="text-align:center;margin-top:50px;font-family:arial;font-size:20px;">
	Congrats!<br>
	You've Benn Successfully Entered<br>
	In The<br>
	System<br>
</div>

<a href="index.php?uc=deconnexion">Se deconnecter</a>