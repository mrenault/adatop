<?php

/**
* Gestion des erreurs avec les exceptions
*/ 

class Erreur  extends Exception {
    
    public function __construct($Msg) {
        parent :: __construct($Msg);
    }
    
    public function RetourneErreur() {
        $msg  = '<div><strong>' . $this->getMessage() . '</strong>';
        $msg .= ' Ligne : ' . $this->getLine() . '</div>';
        return $msg;
    }
}

class Mysql
{
	private
		$Serveur     = 'localhost',
		$Bdd         = 'paiementenligne',
		$Identifiant = 'root',
		$Mdp         = 'root',
		$Lien        = '',	
		$Debogue     = true,	
		$NbRequetes  = 0;



/**
* Constructeur de la classe
* Connexion aux serveur de base de donnée et sélection de la base
*
* $Serveur     = L'hôte (ordinateur sur lequel Mysql est installé)
* $Bdd         = Le nom de la base de données
* $Identifiant = Le nom d'utilisateur
* $Mdp         = Le mot de passe
*/ 
	public
		function __construct($Bdd ='paiementenligne', $Serveur='localhost', $Identifiant='root', $Mdp='root') 
		{
			$this->Serveur     = $Serveur;
			$this->Bdd         = $Bdd;
			$this->Identifiant = $Identifiant;
			$this->Mdp         = $Mdp;

			$this->Lien=mysql_connect($this->Serveur, $this->Identifiant, $this->Mdp);
     		
			if (!$this->Lien && $this->Debogue) throw new Erreur ('Erreur de connexion au serveur MySql!!!');				
				
			$Base = mysql_select_db($this->Bdd,$this->Lien);
     		
			if (!$Base && $this->Debogue) throw new Erreur ('Erreur de connexion à la base de donnees!!!');
		}

/**
* Retourne le nombre de requêtes SQL effectué par l'objet
*/ 		
	public
		function RetourneNbRequetes() 
		{
			return $this->NbRequetes;
		}



/**
* Envoie une requête SQL et récupère le résultât dans un tableau pré formaté
*
* $Requete = Requête SQL
*/ 
	public
		function TabResSQL($Requete)
		{
			$i = 0;
	
			$Ressource = mysql_query($Requete,$this->Lien);
			
     		$TabResultat=array();

     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requête SQL!!!');
			while ($Ligne = mysql_fetch_assoc($Ressource))
			{
				foreach ($Ligne as $clef => $valeur) $TabResultat[$i][$clef] = $valeur;
				$i++;
			}

			mysql_free_result($Ressource);
			
			$this->NbRequetes++;
			
			return $TabResultat;
		}

/**
* $Requete = Execution simple de Requête SQL
*/ 
	public
		function executionRequeteSQL($Requete)
		{
			$i = 0;
	
			$Ressource = mysql_query($Requete,$this->Lien);
			

     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requête SQL!!!');
			
			$this->NbRequetes++;
			
		}
/**
* Retourne le dernier identifiant généré par un champ de type AUTO_INCREMENT
*
*/ 
	public
		function DernierId()
		{	
			return mysql_insert_id($this->Lien);
			
		}
/**
* Envoie une requête SQL et retourne le nombre de table affecté
*
* $Requete = Requête SQL
*/ 
	public
		function ExecuteSQL($Requete)
		{
			$Ressource = mysql_query($Requete,$this->Lien);
			
     		if (!$Ressource and $this->Debogue) throw new Erreur ('Erreur de requête SQL!!!');
			
			$this->NbRequetes++;
			$NbAffectee = mysql_affected_rows();
			
			return $NbAffectee;			
		}		
}
// Fin de la classe //
?>

<?php
// Connexion au système
function connexion($login,$password){

// On appelle la classe de connexion Mysql
	try
{
    $Mysql = new Mysql($Bdd ='paiementenligne', $Serveur='localhost', $Identifiant='root', $Mdp='root'); 
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
}
	
	
//Envoie de la requête SQL
try
{
		$sql = "SELECT login,password,email FROM users WHERE login='".$login."' AND password='".$password."'";
		//echo "Connexion";
		$Resulats = $Mysql->TabResSQL($sql);
    
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
} 

      
      
//Utilisation des résultats
foreach ($Resulats as $Valeur)
	{
		if ($Valeur['email'] != ''){
			session_start(); 
         	$_SESSION['login'] = $Valeur['login'];
         	logActions('connexion',$login,'OK');
			echo "Bravo !!<br> Vous allez être redirigé vers votre <a href='3_bienvenue.php'>formulaire</a>.";
			header("Location: 3_bienvenue.php");
			exit();
		}else if ($Valeur['email'] == ''){
			echo "Erreur de connexion. Vérifiez vos accès.";
		}
/*
    	echo $Valeur['login']."<br />";
    	echo $Valeur['password']."<br />";
    	echo $Valeur['email']."<br />";
    	echo "<br />";
*/
	}
}
// Fin de fonction listeUtilisateurs





function listeUtilisateurs($idUser = NULL){
// On appelle la classe de connexion Mysql
	try
{
    $Mysql = new Mysql($Bdd ='paiementenligne', $Serveur='localhost', $Identifiant='root', $Mdp='root'); 
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
}
	logActions('liste','matthieu');
	
//Envoie de la requête SQL
try
{
	$sql = "SELECT id,login,password,email FROM users ";
	$condition = "WHERE id=".$idUser;
	if ($idUser == '' || $idUser == NULL || !$idUser)
	{
		$composite = $sql;
	}
	else
	{
		$composite = $sql.$condition;	
	}
	
    $Resulats = $Mysql->TabResSQL($composite);
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
} 

//Utilisation des résultats
foreach ($Resulats as $Valeur)
	{	
    	echo $Valeur['login'];
    	echo $Valeur['password'];
    	echo $Valeur['email'];
    	echo "<br>";
	}
}
// Fin de fonction listeUtilisateurs












function envoyerEmail($emailFrom,$emailTo,$sujet,$message){
  $emailFrom = 'vico@mac.com';
  $emailTo = 'vico@mac.com';
  $sujet = 'Mon sujet';
  $message = 'Mon message';
  mail($emailTo, $sujet, $message, "From:" .$emailFrom);
  logActions('email OK a '.$emailTo);
  echo "Test email";
}





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

function logActions($action,$utilisateur){
	include "connexion.php";
	// Test de connexion
	if (mysqli_connect_errno())
  	{
  		echo "Echec de connexion à la base de données SQL : ".mysqli_connect_error();
  	}

	$sql="INSERT INTO logs (user, action, page,erreur) VALUES ('".$utilisateur."','".$action."','".$_SERVER["PHP_SELF"]."','erreur')";

	if (!mysqli_query($con,$sql))
  	{
  		die('Error: ' . mysqli_error());
  	}
	echo "Operation en table de log";
mysqli_close($con);
}
?>