<?php
include('includes/top.php');
include('includes/functions.php');
listeUtilisateurs(2);
?>
<h2>Votre profil - Mes informations</h2>
<p>Mr [Deconnexion]</p>
<table width="436" border="1">
  <tr>
    <th scope="col">Mes informations</th>
    <th scope="col"><a href="profil_inscriptions.php">Mes inscriptions</a></th>
    <th scope="col"><a href="profil_invitation.php">Invitations</a></th>
    <th scope="col">Autre</th>
  </tr>
</table>
<?php
include('includes/bottom.php');
?>