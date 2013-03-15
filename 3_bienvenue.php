<?php
session_start();  
if (!isset($_SESSION['login'])) { 
   header ('Location: index.php'); 
   exit();  
}
include('includes/top.php');
?>
<p>Bienvenue Mr Matthieu RENAULT [<a href="profil.php">Votre profil</a>] - [<a href="deconnexion.php">Deconnexion</a>] </p>
<h2>Formulaire d'inscription</h2>


<div id="main">
<h3>Form Title</h3>
<form id="jquery-order-form" class="jof form-horizontal" action="payer.php" method="post" enctype="multipart/form-data">

<div class="option">
<div class="well">
<h4>Vos choix d'inscription</h4>
<p>Please enter your information here…</p>
<!--<fieldset>-->

<div class="sub-option o-1 o-radio" data-type="radio">
<div class="well">
<p><strong>Session d'ateliers A: </strong></p>
<p>Session d'ateliers A</p>
<ul>
<li>
<input type="radio"  data-cost="" value="Atelier 1A" name="f_1" id="f_1" class="radio validate[required] " />
<label for="f_1"> Atelier 1A</label></li>
<li>
<input type="radio"  data-cost="" value="Atelier 2A" name="f_1" id="f_1" class="radio validate[required] " />
<label for="f_1"> Atelier 2A</label></li>
<li>
<input type="radio"  data-cost="" value="Atelier 3A" name="f_1" id="f_1" class="radio validate[required] " />
<label for="f_1"> Atelier 3A</label></li>
</ul>

</div>
</div>


<div class="sub-option o-2 o-radio" data-type="radio">
<div class="well">
<p><strong>Session d'ateliers B: </strong></p>
<p>Session d'ateliers B</p>
<ul>
<li>
<input type="radio"  data-cost="" value="Atelier 1B" name="f_2" id="f_2" class="radio validate[required] " />
<label for="f_2"> Atelier 1B</label></li>
<li>
<input type="radio"  data-cost="" value="Atelier 2B" name="f_2" id="f_2" class="radio validate[required] " />
<label for="f_2"> Atelier 2B</label></li>
<li>
<input type="radio"  data-cost="" value="Atelier 3B" name="f_2" id="f_2" class="radio validate[required] " />
<label for="f_2"> Atelier 3B</label></li>
</ul>

</div>
</div>


<div class="sub-option o-3 o-checkbox" data-type="checkbox">
<div class="well">
<p><strong>Visite de site: </strong></p>
<p>Votre participation à la visite de site</p>
<ul>
<li>
<input type="checkbox"  data-cost="" value="Votre visite de site" name="f_3[]" id="f_3[]" class="checkbox  " />
<label for="f_3[]"> Votre visite de site</label></li>
</ul>

</div>
</div>


<div class="sub-option o-4 o-radio" data-type="radio">
<div class="well">
<p><strong>Déjeuner le 5 avril 2013: </strong></p>
<p>Votre participation au déjeuner</p>
<ul>
<li>
<input type="radio"  data-cost="50" value="Oui" name="f_4" id="f_4" class="radio validate[required] " />
<label for="f_4"> Oui</label></li>
<li>
<input type="radio" checked="checked" data-cost="0" value="Non" name="f_4" id="f_4" class="radio validate[required] " />
<label for="f_4"> Non</label></li>
</ul>

</div>
</div>

<!--</fieldset>-->

</div>
</div>
<input type="text" name="passage" value="1">
<p><input class="submit btn btn-primary btn-large" type="submit" value="Valider !"></p>
</form>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="lib/jpcp/js/jquery-price-calculator-pro.min.js"></script>
<script type="text/javascript" src="lib/form-validator/js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="lib/form-validator/js/languages/jquery.validationEngine-en.js"></script>
<script type="text/javascript">
$(function(){
    	var form = $('#jquery-order-form');

form.find('span.staticPrice').remove();
form.find('option').each(function(i){
    var opt = $(this)
    opt.text(opt.val());
});
	form.bPrice({"floatSub":true,"showPricesOption":true,"itemize":true,"showZeroAs":"false","subAlign":"right","decimalSep":".","pricesFadeTime":"","emptySummaryText":"<p>Please configure your order…<\/p>","showPrices":false,"signBefore":"\u20ac","signAfter":" EUR","items":{"f_1":"Session d'ateliers A","f_2":"Session d'ateliers B","f_3[]":"Visite de site","f_4":"D\u00e9jeuner le 5 avril 2013"}});

form.validationEngine();
});
</script>

<?php
include('includes/bottom.php');
?>