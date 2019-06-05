<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<title>Gestion des congés</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="pageSalarieNonCadre.css" />

	
	

</head>
<body>

	<script type="text/javascript"> //remet la page en haut lors du rafraichissement
	
		$(document).ready(function(){
		    $(window).scrollTop(0);
		});
	</script>

	<?php
	$db = mysqli_connect('localhost','root','','andrice') or die('Erreur connexion');

	$querySolde ="SELECT * FROM solde WHERE idsalaries='15'";
	$resultSolde = mysqli_query($db,$querySolde) or die('Erreur query');
	$rowSolde = mysqli_fetch_array($resultSolde);
	$querySalarie = "SELECT * FROM salarie WHERE idsalaries='15'";
	$resultSalarie= mysqli_query($db,$querySalarie) or die('Erreur query');
	$rowSalarie =  mysqli_fetch_array($resultSalarie);
	
	?>	
	
	<?php $genre=$rowSalarie['Sexe']; ?> 



	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
		<a class="navbar-brand" href="#">GESTION DES CONGES</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<li class="nav-item">
					<a class="nav-item nav-link active" href="pageSalarieNonCadre.php">GESTION DES CONGES <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-item nav-link" href="demandes.php">Demandes en cours</a>
				</li>
				<li class="nav-item">
					<a class="nav-item nav-link" href="historique.php">Historique</a>
				</li>
				<li class="nav-item dropdown navbar-right">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="label label-pill label-danger count" style="border-radius:10px;"></span>
						<span class="far fa-bell" style="font-size:18px;"></span>
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					</div>
				</li>
			</div>
		</div>
	</nav>


	<div class="offset-lg-2 col-lg-11">
		<div class="row mt-3">
			<div class="col-md-8 col-lg-3 offset-lg-1">
				<div class="card text-center">
					<div class="card-header" >CONG&EacuteS PAY&EacuteS</div> 
					<div class="card-body">

						<p >Solde actuel : <?php echo $rowSolde['SOLDECPN'];?> jours</p>
						<p >Solde restant du N-1 : <?php echo $rowSolde['SOLDECPN-1']?> jours</p>
						<p >Pris en N : <?php echo $rowSolde['PRISCPN']?> jours</p>
					</div>


				</div>
			</div>

		
		<div class="col-md-8 col-lg-3 offset-lg-0">
			<div class="card text-center">
				<div class="card-header" >RCR</div> 
				<div class="card-body">

					<p >Solde actuel : <?php echo $rowSolde['SOLDEJRRCR'];?> jours</p>
					<p >Pris en N : <?php echo $rowSolde['PRISJRRCR']?> jours</p>
					<p >Acquis en N : <?php echo $rowSolde['ACQUISJRRCR']?> jours</p>
				</div>


			</div>
			

		</div>
	</div>

		<div class="row mt-3">
			<div class="col-md-8 col-lg-4 offset-lg-2">
				<div class="card text-center">
					<div class="card-header">DEMANDE D'ABSENCE</div>
					<div id="demandeAbsence" class="card-body">
						<form id="f"  onsubmit="return false">
							<fieldset>
								<select name="motifAbsence" id="motifAbsence" size="1" class="form-control" onchange="showPopUp()" >
									<option value="" disabled selected>--Choisissez un motif d'absence--</option>
									<option value="1">Décès </option>
									<option value="2">Mariage</option>
									<option value="3">Naissance/Adoption</option>
									<option value="4">Examens médicaux liés à la grossesse</option>
									<option value="7">Congé enfant malade</option>

								</select><br><br>
								<input type="submit" class="btn btn-info" value="Demander" onclick="clickMotifAbsence(),document.getElementById('ancre2eChoix').scrollIntoView();"/>

							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">

					<div  id="popup1" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" datt a-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							En cas de décès d'un proche, vous pouvez faire une demande d'absence de 2 jours ouvrés s'il s'agit du conjoint, enfant ou ascendant et d'un jour ouvré s'il s'agit d'un collatéral jusqu'au 2e degré ou d'un beau-parent.
						</div>
					</div>


				</div>
				<div class="position-absolute w-100 p-4 d-flex flex-column align-items-end toast-list">

					<div  id="popup2" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							S'il s'agit de votre propre mariage, vous pouvez faire une demande de 4 jours ouvrés. S'il s'agit du mariage d'un de vos enfants, vous pouvez faire une demande d'un jour ouvré. L'envoi d'un justificatif au service RH est obligatoire après validation.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popup3" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							En cas de naissance ou d'adoption, vous pouvez faire une demande de 3 jours ouvrés. Vous pouvez fractionner ces 3 jours. L'envoi d'un justificatif au service RH est obligatoire après validation.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">

					<div  id="popup4" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Vous pouvez faire une demande d'au moins 0,5 jour.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popup5" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Vous pouvez faire une demande de 11 jours calendaires consécutifs (c'est-à-dire samedi et diamnche compris). L'envoi d'un justificatif au service RH est obligatoire après validation.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popup6" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Congé maternité
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popup7" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Info enfant malade
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="row mt-3" id="ancre2eChoix">
			<div class="col-md-8 col-lg-5 offset-lg-2">
				<div  id="deces" class="card text-center">

					<form id="fDeces" >
						<fieldset>
							<div class="card-header">Veuillez renseigner votre lien de parenté avec le/la défunt.e :</div>
							<div class="card-body">
								<select name="casDeces" id="casDeces" size="1" class="form-control"  onchange="infoDeces()">
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
								<select name="casMariage" id="casMariage" size="1" class="form-control"  onchange="infoMariage()">
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
					<div  id="popupsDeces1" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Attention, vous ne pouvez prendre que 2 jours ouvrés.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popupsDeces2" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Attention, vous ne pouvez prendre qu'un jour ouvré.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popupsMariage1" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Vous pouvez faire une demande de 4 jours ouvrés.
						</div>
					</div>
				</div>
				<div class="position-absolute w-100 p-4  d-flex flex-column align-items-end toast-list">
					<div  id="popupsMariage2" class="toast" data-autohide="false">
						<div class="toast-header">
							<strong class="mr-auto text-primary">Informations</strong>
							<button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
						</div>
						<div class="toast-body">
							Vous pouvez faire une demande d'un jour ouvré.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>




<?php mysqli_close($db);?>
<script type="text/javascript">
	var genre='<?PHP echo $genre;?>';

	if(genre==="Homme"){
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé paternité","5");
	}
	else{
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé maternité","6");
	}

</script>

<script  src='pageSalarieNonCadre.js'></script>



</body>
</html>