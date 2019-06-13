<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Historique Manager</title>
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
	<script src="historique.js"></script>
	<script src="navbar.js"></script>
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	
</head>

<body>
	<div data-include="navbar"></div>
	<div class="container-fluid" style="background-color:navy;color:white;text-align:center;width:100%;">
		<br>
		<h1>HISTORIQUE DES DEMANDES DE CONGÉS</h1>
		<br>
	</div>
	<div class="container-fluid" >
		<br>
		<br>
		<div class="row" style='width:100%;padding-left: 20px;'>
			<div class="col-xl-12 col-lg-12">
				<table class="table table-striped table-hover table-responsive "
				id = "table" data-search="true"
				data-filter-control="true" data-search-align="left"
				date-filter-show-clear="true"
				data-show-fullscreen="true" style="width:100%;"> 
				<thead>
					<tr>
						<th data-sortable="true">Nom</th>
						<th data-sortable="true">Prenom</th>
						<th data-sortable="true">Date de demande</th>
						<th data-sortable="true">Date de début</th>
						<th data-sortable="true">Nombre de jours</th>
						<th data-sortable="true">Type</th>
						<th data-sortable="true">Statut</th>
						<th data-sortable="true">Traitée le</th>
						<th data-sortable="true">Solde CP</th>
						<th data-sortable="true">Solde RCR</th>
					</tr>
				</thead>

				<?php
				include('../../Control/controlManager.php');
				?>	
				<tbody id="myTable">	
					<?php
						// on fait une boucle qui va faire un tour pour chaque enregistrement 
					while ($row = mysqli_fetch_array($result))  
						//foreach($result as $row)
					{ 
						?>
						<tr>
							<td><?php echo $row['Nom']; ?></td>
							<td><?php echo $row['Prenom']; ?></td>
							<td><?php echo $row['Date_envoie']; ?></td>
							<td><?php echo $row['Date_deb']; ?></td>
							<td><?php echo $row['NbEngage']; ?></td>
							<td><?php echo $row['Type']; ?></td>
							<?php if($row['MotifRefus'] != NULL){ 
								$Motif = $row['MotifRefus']; 
								echo "<td><a href='#' title='Motif de refus' data-toggle='popover' data-trigger='focus' data-placement='bottom' data-content='".$Motif."'><i class='fas fa-info'></i></a> Refusée</td>";
							}else{ ?>
								<td><?php echo $row['Valide']? 'Validée' : 'En attente';} ?></td>
							<td><?php echo $row['Date_resFina']; ?></td>
							<td><?php echo $row['SOLDECPN']; ?></td>
							<td><?php echo $row['SOLDEJRRCR']; ?></td>
						</tr>
						<?php
					}  
					?>
				</tbody>

			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
	  $('[data-toggle="popover"]').popover();   
	});
</script>

</body>

</html>