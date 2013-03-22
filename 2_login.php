<?php include('includes/top.php');
include('includes/functions.php');

if (isset($_POST['Valider']) && $_POST['Valider'] == 'Valider') { 
   if ((isset($_POST['login']) && !empty($_POST['login'])) && (isset($_POST['password']) && !empty($_POST['password']))) {
   $login = $_POST['login'];
   $password = $_POST['password'];
   
   connexion($login,$password);
   //echo "connexion";
   }else{
   echo "Pas de connexion possible, manque des informations de login";
   }
      //echo "toujours rien";
   }
?>
<p><h2>Connectez-vous</h2></p>
<form id="connexion" name="connexion" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
  <p>
    <label for="Votre email">Votre login</label>
    <input type="text" name="login" id="login" value="" />
  </p>
  <p>
    <label for="Votre mot de passe">Votre mot de passe</label>
    <input type="text" name="password" id="password" value="" />
  </p>
  <p>
    <input type="submit" name="Valider" id="Valider" value="Valider" class="submit btn btn-primary btn-large" />
  </p>
</form>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>