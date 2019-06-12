<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet"/>
	<script  src='navbar.js'></script>
</head>

<body>
	<div data-include="navbar"></div>
	<div class="container-fluid" style="background-color:navy;color:white;text-align:center;width:100%;">
		<br>
		<h1>HISTORIQUE DES DEMANDES DE CONGÉS</h1>
		<br>
	</div>
	<div class="container-fluid">
		<br>
		<br>
		<div class="row" style='width:100%;'>
			<div class="col-xl-12 col-lg-12">
				<table class="table table-striped table-hover table-responsive "
						id = "table" data-search="true"
						data-filter-control="true" data-search-align="left"
						date-filter-show-clear="true"
						data-show-fullscreen="true" style="width:100%;"> 
					<thead>
						<tr>
							<th data-sortable="true">Date de début</th>
							<th data-sortable="true">Nombre de jours</th>
							<th data-sortable="true">Type</th>
							<th data-sortable="true">Statut</th>
							</tr>
					</thead>
					
					<?php
						
				include('../../Control/controlSal.php');
						
					?>
					<tbody id="myTable">	
					<?php
						// on fait une boucle qui va faire un tour pour chaque enregistrement 
						while ($row = mysqli_fetch_array($result))  
							{ 
							$date_deb = new DateTime($row['Date_deb']); 
							?>
							<tr>
								<td><?php echo $date_deb->format('d-m-Y'); ?></td>
								<td><?php echo $row['NbEngage']; ?></td>
								<td><?php echo $row['Type']; ?></td>
								<td><?php if($row['MotifRefus'] != NULL){echo 'Refusée';}else{echo $row['Valide']? 'Validée' : 'En attente';} ?></td>
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
		$(document).ready(function() {
		  $('#table').DataTable({  
			"bAutoWidth": false,
			"aoColumns" : [
				{ sWidth: '1200px' },
				{ sWidth: '1200px' },
				{ sWidth: '1200px' },
				{ sWidth: '1200px' },
				]  
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
	
</body>

</html>