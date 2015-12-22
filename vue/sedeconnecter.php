<?php
		session_start();
		header('Location:index.php?uc=accueil');	  

		// Unset all of the session variables.
		session_unset();

		// Destroy the session.
		 session_destroy();
?>
