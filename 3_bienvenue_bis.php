<?php
include('includes/top.php');
?>
<h2>Veuillez saisir votre email (vérification ERP)</h2>
<form id="form1" name="form1" method="post" action="4_verif_email.php">

  <p>
    <label for="eMail">eMail</label>
    <input type="text" name="eMail" id="eMail" />
  </p>

<p>Vérifier l'email -&gt; Si n'existe pas dans ERP
  <input type="submit" name="valider" id="valider" value="Submit" class="submit btn btn-primary btn-large"/>
</p>
<p>Vérifier l'email -&gt; Si existe dans ERP
  <a href="4_verif_email_ok.php"><input type="button" name="valider" id="valider" value="Submit" class="submit btn btn-primary btn-large" /></a>
</p>
</form>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>