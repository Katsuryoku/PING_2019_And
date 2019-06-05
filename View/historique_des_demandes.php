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
	
</head>

<body>
	<div class="container-fluid" style="background-color:navy;color:white;text-align:center;width:100%;">
		<br>
		<h1>HISTORIQUE DES DEMANDES DE CONGÉS</h1>
		<br>
	</div>
	<div class="container-fluid" >
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
							<th data-sortable="true" data-filter-control="select">Nom</th>
							<th data-sortable="true">Prenom</th>
							<th data-sortable="true">Date de début</th>
							<th data-sortable="true">Nombre de jours</th>
							<th data-sortable="true" data-filter-control="select">Type</th>
							<th data-sortable="true" data-filter-control="select">Statut</th>
							<th data-sortable="true">Solde CP</th>
							<th data-sortable="true">Solde RCR</th>
						</tr>
					</thead>
					
					<?php
						// on se connecte à MySQLi 
						$db = mysqli_connect('localhost','root','','andrice')
								or die('Error connecting to MySQL server.');  

						 

						// on crée la requete SQL 
						$query = "SELECT salarie.Nom as Nom,Prenom,DATE_FORMAT(Date_deb, '%d-%m-%Y') as Date_deb, NbEngage , typedemande.Nom as Type, Valide, MotifRefus, SOLDECPN, SOLDEJRRCR FROM demande JOIN salarie on demande.idsalaries = salarie.idsalaries JOIN solde on demande.idsalaries = solde.idsalaries JOIN typedemande on demande.idtype = typedemande.idtype";

						// on envoie la requête 
						$result = mysqli_query($db, $query); 
					?>
					<tbody id="myTable">	
					<?php
						// on fait une boucle qui va faire un tour pour chaque enregistrement 
						while ($row = mysqli_fetch_array($result))  
						//foreach($result as $row)
							{ 
							$date_deb = new DateTime($row['Date_deb']); 
							?>
							<tr>
								<td><?php echo $row['Nom']; ?></td>
								<td><?php echo $row['Prenom']; ?></td>
								<td><?php echo $date_deb->format('d-m-Y'); ?></td>
								<td><?php echo $row['NbEngage']; ?></td>
								<td><?php echo $row['Type']; ?></td>
								<td><?php if($row['MotifRefus'] != NULL){echo $row['Valide']? 'Validé' : 'Non validé';}else{echo 'En attente';} ?></td>
								<td><?php echo $row['SOLDECPN']; ?></td>
								<td><?php echo $row['SOLDEJRRCR']; ?></td>
							</tr>
							<?php
							}  

						// on ferme la connexion à mysql 
						mysqli_close($db);  
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
				{ sWidth: '1000px' },
				{ sWidth: '1000px' },
				{ sWidth: '1500px' },
				{ sWidth: '1200px' },
				{ sWidth: '1000px' },
				{ sWidth: '1550px' },
				{ sWidth: '1000px' },
				{ sWidth: '1000px' }
			]  
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>
	
</body>

</html>