<?php
include('includes/top.php');

if ($_POST['passage'] == "") {
?>
<h2>Choisir votre mode de paiement</h2>
<p>Récapitulatif de votre inscription/commande :</p>
<blockquote>
  <p>Atelier 1 : Gratuit</p>
  <p>Visite de site : Gratuit</p>
  <p>Déjeuner : 25 €</p>
  <p><strong>Total : 25 €</strong></p>
</blockquote>
<form id="form1" name="form1" method="post" action="payer.php">
  <p>
    <label>
      <input type="radio" name="paiement" value="mandat" id="paiement_0" />
      Mandat</label>
    <br />
    <label>
      <input name="paiement" type="radio" id="paiement_1" value="cartebleue" checked="checked" />
      Carte bleue</label>
    (Par défaut)<br />
    <label>
      <input type="radio" name="paiement" value="cheque" id="paiement_2" />
      Chèque</label>
  </p>
  <p>Aller vers Paybox
    <input type="submit" name="valider" id="valider" value="Submit" class="submit btn btn-primary btn-large"/>
    <br />
  </p>
</form>
<p>Autre...</p>
<p>&nbsp;</p>
<?php

} else {

// le formulaire est renvoyé sur lui même on prépare la suite la transmission vers Paybox...

// Paramétrage de vos constantes, attention les valeurs avec * devront être renseignées

// en dynamique car elles changent à chaque commande...


$PBX_MODE ='4'; // appel en ligne de commande
$PBX_LANGUE ='FRA';
$PBX_SITE ='1999888'; // Site Paybox 
$PBX_RANG ='99'; // Rang Paybox
$PBX_IDENTIFIANT ='2'; // Identifiant Paybox 
$PBX_TOTAL ='1000'; // la valeur en centième d'euros, soit 1000 = 10,00 € *
$PBX_DEVISE ='978';
$PBX_CMD ='22'; // Le numéro de la commande * 
$PBX_PORTEUR ='test@paybox.com';// l'email du client pour qu'il reçoive son ticket *
$PBX_RETOUR = 'auto:A\;amount:M\;ident:R\;trans:T\;carte:C\;tran:S\;dat:D\;erreur:E';
$PBX_EFFECTUE ='http://www.monsite.com/fr/merci-pour-votre-achat.php';
$PBX_REFUSE ='http://www.monsite.com/fr/erreur-paiement.php';
$PBX_ANNULE ='http://www.monsite.com/fr/erreur-paiement.php';

$MOD = '../cgi-bin/modulev2.cgi';
// Attention il faut donner le bon chemin vers votre module : modulev2.cgi

$PBX = ' PBX_MODE='.$PBX_MODE.' PBX_LANGUE='.$PBX_LANGUE.' PBX_SITE='.$PBX_SITE.' PBX_RANG='.$PBX_RANG.' PBX_IDENTIFIANT='.$PBX_IDENTIFIANT.' PBX_TOTAL='.$PBX_TOTAL.' PBX_DEVISE='.$PBX_DEVISE.' PBX_CMD='.$PBX_CMD.' PBX_PORTEUR='.$PBX_PORTEUR.' PBX_RETOUR='.$PBX_RETOUR.' PBX_EFFECTUE='.$PBX_EFFECTUE.' PBX_REFUSE='.$PBX_REFUSE.' PBX_ANNULE='.$PBX_ANNULE; // tout ce texte est sur une seule ligne

echo shell_exec($MOD.$PBX);

} // fin du if 

include('includes/bottom.php');
?>