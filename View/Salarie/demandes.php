<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Demandes en cours</title>
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link href="daterangepicker.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="pageSalarieNonCadre.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript"  src="inputSalarie.js"></script>
	<script src="navbar.js"></script>
	<script src="moment.min.js"></script>
	<script src="daterangepicker2.js"></script>
	<script  src='pageSalarieNonCadre.js'></script>

</head>

<body>
	<div data-include="navbar"></div>
	<div id="Test">
		<table id="Demandes" class="table table-responsive table-hover table-bordered">
			<tr>
			<th>Demande</th>
			<th>Type</th>
			<th>Nom</th>
			<th>Manager</th>
			<th>Date Conge</th>
			<th>Date Envoie</th>
			<th>Nb Jours</th>
			<th>Modifier/Supprimer</th>
			</tr>
		</table>
		
	</div>
</body>
</html>