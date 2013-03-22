<?php
include('includes/top.php');
include('includes/functions.php');

if (isset($_POST['Valider']) && $_POST['Valider'] == 'Valider') { 
   if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password'])) && (isset($_POST['email']) && !empty($_POST['email']))&& (isset($_POST['nom']) && !empty($_POST['nom']))&& (isset($_POST['prenom']) && !empty($_POST['prenom']))) {

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
	$sql="INSERT INTO users (login, password, email,acl) VALUES ('".$_POST['login']."','".$_POST['password']."','".$_POST['email']."','2')";
    $Resulats = $Mysql->executionRequeteSQL($sql);
    echo "On insert l'utilisateur";
}
catch (Erreur $e) {
    echo $e -> RetourneErreur();
}

try
{

// On retrouve l'ID qu'on vient d'insérer dans la table users
	$sqlGetID = "SELECT id,email FROM users WHERE email='".$_POST['email']."'";	
    $ResulatsGetID = $Mysql->TabResSQL($sqlGetID);
    echo "On cherche l'ID profil";
}

catch (Erreur $e) {
    echo $e -> RetourneErreur();
} 

//Utilisation des résultats
foreach ($ResulatsGetID as $Valeur)
	{	
		$idInscription = $Valeur['id'];
		echo $idInscription;

	$sql2="INSERT INTO profil (partenaire_id,evenement_evt_id,user_id,nom,prenom,adresse,exposant,codepostal,ville,pays,telephone,fax) VALUES ('0','0','".$idInscription."','".$_POST['nom']."','".$_POST['prenom']."','adresse','0','cp','ville','pays','tel','fax')";
    $Resulats2 = $Mysql->executionRequeteSQL($sql2);
echo "On insert le profil";
}




}
	echo $idInscription."Saisie OK";
		
   	}else{
		echo "Veuillez renseigner les champs obligatoires.";
   	}   

?>
<p>Bienvenue Mr Matthieu RENAULT [<a href="profil.php">Votre profil</a>] - [<a href="deconnexion.php">Deconnexion</a>] </p>
<h2>Information non trouvée dans l'ERP</h2>
<form id="inscription" name="inscription" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
Vos informations de connexion (informations pour vous reconnecter)
  <p>
    <label for="Nom">Email *</label>
    <input type="text" name="email" id="email" value="<?php echo $_POST['email']; ?>" />
  </p>
<p>
    <label for="Nom">Nom d'utilisateur *</label>
    <input type="text" name="login" id="login" value="" />
  </p>
<p>
    <label for="Nom">Mot de passe *</label>
    <input type="password" name="password" id="password" value="" />
  </p>
Vos informations de profil
  <p>
    <label for="Nom">Nom *</label>
    <input type="text" name="nom" id="nom" value="" />
  </p>
  <p>
    <label for="Prénom">Prénom *</label>
    <input type="text" name="prenom" id="prenom" value="" />
  </p>
  
  <p>
    <label for="type_organisme">type organisme *</label>
    <select name="type_organisme" id="type_organisme">
      <option value="Privé">Privé</option>
      <option value="Mairie">Mairie</option>
      <option value="Conseil Général">Conseil Général</option>
      <option value="Autre...">Autre...</option>
    </select>
  </p>
  <p>
    <label for="organisme">organisme *</label>
    <input type="text" name="organisme" id="organisme" />
    <br />
  </p>
<p>
  <input type="submit" name="Valider" id="Valider" value="Valider" class="submit btn btn-primary btn-large"/>
</p>
</form>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>