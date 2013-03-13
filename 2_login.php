<?php
include('includes/top.php');
?>
<p><h2>Connectez-vous</h2></p>
<form id="form1" name="form1" method="post" action="3_bienvenue.php">
  <p>
    <label for="Votre email">Votre email</label>
    <input type="text" name="Votre email" id="Votre email" />
  </p>
  <p>
    <label for="Votre mot de passe">Votre mot de passe</label>
    <input type="text" name="Votre mot de passe" id="Votre mot de passe" />
  </p>
  <p>
    <input type="submit" name="Valider" id="Valider" value="Valider" class="submit btn btn-primary btn-large" />
  </p>
</form>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>