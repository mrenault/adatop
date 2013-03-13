<?php
include('includes/top.php');
?>
<h2>Paybox</h2>
<form id="form1" name="form1" method="post" action="merci.php">
  <p><img src="images/logo-paybox.jpg" width="302" height="190" /></p>
  <p>
    <label for="Numéro de carte bleue">Numéro de carte bleue</label>
    <input name="Numéro de carte bleue" type="text" id="Numéro de carte bleue" value="6456 83747 8475 8844" />
  </p>
  <p>valider
    <input type="submit" name="valider" id="valider" value="Submit" class="submit btn btn-primary btn-large" />
    <br />
  </p>
</form>
<p>Autre...</p>
<p>&nbsp;</p>
<?php
include('includes/bottom.php');
?>