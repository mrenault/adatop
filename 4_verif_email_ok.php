<?php
include('includes/top.php');
?>
<p>Bienvenue Mr Matthieu RENAULT [<a href="profil.php">Votre profil</a>] - [<a href="http://www.carrefour-eau.com/2013/co/mot-bienvenue-14e-carrefour-gestions-eau.html">Deconnexion</a>] </p>
<h2>Information trouvée dans l'ERP</h2>
<form id="form1" name="form1" method="post" action="3_bienvenue.php">
  <p>
    <label for="Nom">Nom *</label>
    <input name="Nom" type="text" id="Nom" value="Renault" />
  </p>
  <p>
    <label for="Prénom">Prénom *</label>
    <input name="Prénom" type="text" id="Prénom" value="Matthieu" />
  </p>
  <p>
    <label for="eMail">eMail</label>
*    
<input name="eMail" type="text" id="eMail" value="m.renault@idealconnaissances.com" />
  </p>
  <p>
    <label for="type organisme">type organisme *</label>
    <select name="type organisme" id="type organisme">
      <option value="Privé">Privé</option>
      <option value="Mairie">Mairie</option>
      <option value="Conseil Général">Conseil Général</option>
      <option value="Autre...">Autre...</option>
    </select>
  </p>
  <p>
    <label for="organisme">organisme *</label>
    <input name="organisme" type="text" id="organisme" value="Mairie de paris" />
    <br />
  </p>
<p>valider
  <input type="submit" name="valider" id="valider" value="Submit" class="submit btn btn-primary btn-large" />
</p>
</form>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>