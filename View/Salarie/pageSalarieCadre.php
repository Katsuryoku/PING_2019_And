<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Gestion des congés</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link href="daterangepicker.css" rel="stylesheet">
	<link rel="stylesheet" href="pageSalarieNonCadre.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<!-- Server -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<!-- Local -->
	<script src="moment.min.js"></script>
	<script src="daterangepicker.js"></script>
	<script  src='pageSalarieNonCadre.js'></script>
	<script  src='navbar.js'></script>
	

</head>
<body>

	<script type="text/javascript"> //remet la page en haut lors du rafraichissement
	
	$(document).ready(function(){
		$("html, body").animate({ scrollTop: 0 }, 100);
	});
</script>

<?php
include('../../Control/controlSal.php');
?>	

<div data-include="navbar"></div>


<div data-include="sideBar"></div>

	<div class="offset-lg-4 col-lg-8">
		<div class="row mt-3">
			<div class="col-md-8 col-lg-4 offset-lg-1">
				<div class="card text-center">
					<div class="card-header" >CONG&EacuteS PAY&EacuteS</div> 
					<div class="card-body">

						<p >Solde actuel : <?php echo $soldeCpn;?> jours</p>
						<p >Solde restant du N-1 : <?php echo $soldeCpnm1;?> jours</p>
						<p >Pris en N : <?php echo $prisCpn;?> jours</p>
						<p ><input type="submit" class="btn btn-info" value="Demande CP" onclick="sendType('1');calendarFunction();calendarFunctionBis()"/></p>

					</div>


				</div>
				<div id="myDIVBis" style = "display : none">
					<div ng-controller="MainCtrl" class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="container mt-5 mb-5" style="width: 235px">
								<input type="text" id="picker" class="form-control">
							</div>
							<script>
								$(document).ready(function(){
									$("#picker").daterangepicker({
										timePicker: true,
										startDate: moment().startOf('hour'),
										endDate: moment().startOf('hour').add(32, 'hour'),
										locale: {
											format: ' DD/M A',
											daysOfWeek: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
											monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
										}
									});
								});
							</script>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-8 col-lg-4">
				<div class="card text-center">
					<div class="card-header" >RCR</div> 
					<div class="card-body">

						<p >Solde actuel : <?php echo $soldeJRRCR;?> jours</p>
						<p >Pris en N : <?php echo $prisJRRCR;?> jours</p>
						<p >Acquis en N : <?php echo $acquisJRRCR;?> jours</p>
						<p ><input type="submit" class="btn btn-info" value="Demande RCR" onclick="sendType('1');calendarFunctionBis();calendarFunction()"/></p>
					</div>


				</div>
				<div id="myDIV" style = "display : none">
					<div ng-controller="MainCtrl" class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="container mt-5 mb-5" style="width: 235px">
								<input type="text" id="pickerBis" class="form-control">
							</div>
							<script>
								$(document).ready(function(){
									$("#pickerBis").daterangepicker({
										timePicker: true,
										startDate: moment().startOf('hour'),
										endDate: moment().startOf('hour').add(32, 'hour'),
										locale: {
											format: ' DD/MM'
										}
									});
								});
							</script>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="row mt-3">
			<div class="col-md-8 col-lg-4 offset-lg-3">
				<div class="card text-center">
					<div class="card-header">DEMANDE D'ABSENCE</div>
					<div id="demandeAbsence" class="card-body">
						<form id="f"  onsubmit="return false">
							<fieldset>
								<select name="motifAbsence" id="motifAbsence" size="1" class="form-control" onchange="showPopUp()" >
									<option value="" disabled selected>--Choisissez un motif d'absence--</option>
									<option value="01">Décès </option>
									<option value="02">Mariage</option>
									<option value="03">Naissance/Adoption</option>
									<option value="04">Examens médicaux liés à la grossesse</option>
									<option value="07">Congé enfant malade</option>

								</select><br><br>
								<input type="submit" class="btn btn-info" value="Demander" onclick="clickMotifAbsence(),document.getElementById('ancre2eChoix').scrollIntoView();"/>

							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">

					<div  id="popup" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
						</div>
						<div class="toast-body" id="descr1"></div>
					</div>


				</div>
			</div>
		</div>

		<div class="row mt-3" id="ancre2eChoix">
			<div class="col-md-8 col-lg-4 offset-lg-3">
				<div  id="deces" class="card text-center">

					<form id="fDeces" >
						<fieldset>
							<div class="card-header">Veuillez renseigner votre lien de parenté avec le/la défunt.e :</div>
							<div class="card-body">
								<select name="casDeces" id="casDeces" size="1" class="form-control"  onchange="infoDecesMariage()">
									<option value="" disabled selected>--Choisissez votre situation--</option>
									<option value="1">Enfant, conjoint ou ascendants</option>
									<option value="2">Collatéraux jusqu'au 2e degré</option>
									<option value="3">Beaux-parents</option>

								</select><br><br>
								<input id="bDeces" type="submit" value="Demander" class="btn btn-info" />
							</div>
						</fieldset>
					</form>

				</div>
				<div  id="mariage" class="card text-center">

					<form id="fMariage" >
						<fieldset>
							<div class="card-header">Veuillez renseigner s'il s'agit de votre mariage ou celui d'un de vos enfants :</div>
							<div class="card-body">
								<select name="casMariage" id="casMariage" size="1" class="form-control"  onchange="infoDecesMariage()">
									<option value="" disabled selected>--Choisissez votre situation--</option>
									<option value="1">Votre mariage</option>
									<option value="2">Mariage d'un enfant</option>


								</select><br><br>
								<input id="bMariage" type="submit" value="Demander" class="btn btn-info" />
							</div>
						</fieldset>
					</form>

				</div>
			</div>
			<div class="col">

				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popupsDeces" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
						</div>
						<div class="toast-body" id="descr2"></div>
					</div>
				</div>

			</div>
		</div>
	</div>



</div>





<script type="text/javascript">
	var genre='<?PHP echo $genre;?>';

	if(genre==="Homme"){
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé paternité","05");
	}
	if(genre==="Femme"){
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé maternité","06");
	}

</script>

<script  src='pageSalarieNonCadre.js'></script>




</body>
</html>