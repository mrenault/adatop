<?php
include('../../includes/functions.php');
?>
<a href="evenements/">Gestion des évenements</a>
<a href="exposants/">Gestion des exposants</a>
Gestion des utilisateurs
<a href="transactions/">Gestion des transactions</a>
<h2>Interface d'aministration</h2><div>


<?php
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
	$sql = "SELECT login,password,email,nom FROM users INNER JOIN profil ON users.id = profil.users.id";
		
    $Resulats = $Mysql->TabResSQL($sql);
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
} 

//Utilisation des résultats
foreach ($Resulats as $Valeur)
	{	
    	?>Login : <?php echo $Valeur['login']; ?><br>
    	Mot de passe : <?php echo $Valeur['password']; ?><br>
    	Email : <?php echo $Valeur['email']; ?><br>
    	Nom : <?php echo $Valeur['nom']; ?>
    	<?php
	}

// Fin de fonction listeUtilisateurs
?>
</div>