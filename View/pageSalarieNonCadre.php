<!DOCTYPE html>
<?php
  include '../Model/accessBDD.php';
  $donnees = accessBDD("55","SOLDE");
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="pageSalarieNonCadre.css" />
	<title>Gestion des congés</title>
	
	
</head>
<body>
	<div class="vertical-menu">
		<label>Demande en cours</label>
		<label>Historique</label>
	</div>
	<div id="div1">
		<div id="CP">Congés payés</p>
		<p><?php
				echo $donnees['SOLDECPN'];
				?> jours</p>
			</div>
		<p id="soldes N-1"><?php
				echo $donnees['SOLDECPN-1'];
				?> solde restant du N-1 </p>
		<p id="pris"><?php
				echo $donnees['PRISCPN'];
				?> pris en N </p>
	</div>
		

	</div>
	<div id="demandeAbsence">
		<form id="f">
			<fieldset id="section-1">
			<label for="motifAbsence">Veuillez choisir un motif d'absence :</label><br><br>
			<select name="motifAbsence" id="motifAbsence" size="1" onchange="showPopUp()">
				<option value="" disabled selected>--Choisissez un motif d'absence--</option>
				<option value="a">Décès </option>
				<option value="b">Mariage</option>
				<option value="c">Naissance/Adoption</option>
				<option value="d">Examens médicaux liés à la grossesse</option>
				<option value="e">Congé paternité</option>
				<option value="f">Congé maternité</option>
				<option value="g">Congé enfant malade</option>
			</select><br><br>
			<input type="submit" value="Demander" />
			</fieldset>
		</form>
	</div>
	<div class="popups" id="popup1">Informations Décès</div>
	<div class="popups" id="popup2">Informations Mariage</div>
	<div class="popups" id="popup3">Informations Naissance</div>
	<div class="popups" id="popup4">Informations Examens</div>

	<script  src='pageSalarieNonCadre.js'></script>
</body>
</html>