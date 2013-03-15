<?php

function ajoutUtilisateurs(){
	include "connexion.php";
	logActions('ajout');
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}

	$sql="INSERT INTO users (login, password, email,acl) VALUES ('zzzz','eeee','sdfdsf@mac.com','45')";

	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error());
  	}
	echo "Ajout de la saisie";

mysqli_close($con);
}
// Fin de fonction listeUtilisateurs

?>