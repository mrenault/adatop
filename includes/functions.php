<?php
function envoyerEmail($emailFrom,$emailTo,$sujet,$message){
  $emailFrom = 'vico@mac.com';
  $emailTo = 'vico@mac.com';
  $sujet = 'Mon sujet';
  $message = 'Mon message';
  mail($emailTo, $sujet,
  $message, "From:" . $emailFrom);
  logActions('email OK a '.$emailTo);
  echo "Test email";
}

function listeUtilisateurs($idUser){
	include "connexion.php";
	logActions('liste');
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}


	// Selection des utilisateurs
	$sql = "SELECT * FROM users ";
	$condition = "WHERE id=".$idUser;
	if ($idUser == '' || $idUser == NULL || !$idUser)
	{
		$composite = $sql;
	}
	else
	{
		$composite = $sql.$condition;	
	}
	
	$result = mysqli_query($con,$composite);

	while($row = mysqli_fetch_array($result))
  	{
  		echo $row['login']." ".$row['password'];
  		echo "<br />";
  	}

mysqli_close($con);
}
// Fin de fonction listeUtilisateurs


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

// Début effacement d'un utilisateur
function effacerUtilisateurs($idUser){
	include "connexion.php";
	logActions('effacer');
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}

	if ($idUser == '' || $idUser == NULL || !$idUser)
	{
		$sql = '';
	}
	else
	{
		$sql = "DELETE FROM users WHERE id='".$idUser."'";	
	}
	

	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error());
  	}
	echo "Effacement de l'utilisateur";

mysqli_close($con);
}
// Fin de fonction listeUtilisateurs



// Début effacement d'un utilisateur
function miseajourUtilisateurs($idUser){
	include "connexion.php";
	logActions('mise a jour');
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}

	if ($idUser == '' || $idUser == NULL || !$idUser)
	{
		$sql = '';
	}
	else
	{
		$sql = "UPDATE users SET login='toto' WHERE id='".$idUser."'";	
	}
	

	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error());
  	}
	echo "Effacement de l'utilisateur";

mysqli_close($con);
}
// Fin de fonction listeUtilisateurs

function logActions($action){
	include "connexion.php";
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}

	$sql="INSERT INTO users (login, password, email,acl) VALUES ('".$action."','".$_SERVER["PHP_SELF"]."','sdfdsf@mac.com','45')";

	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error());
  	}
	echo "Ajout de la saisie";

mysqli_close($con);
}
?>