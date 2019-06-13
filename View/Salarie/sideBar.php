<div class="sidenav" style="height:100%;width:300px;position: fixed;background-color:lightsteelblue;padding-top: 30px">
	<div class="container-fluid">
		<table class="table table-striped table-hover table-responsive" style="padding:10px;">
			<tr style="background-color:gainsboro;">
				<th>Dernières demandes</th>
			</tr>
			<?php 

include('../../Control/controlSal.php');
			while ($row = mysqli_fetch_array($result)){
				$date_deb = new DateTime($row['Date_deb']);
				if($row['MotifRefus'] != NULL){
					$status = 'Refusée';
				}else{
					$status = $row['Valide']? 'Validée' : 'En attente';
				}
				?>
				<?php if($status == 'Refusée') {?><tr style="background-color:red;">
					<td><?php echo $row['NbEngage']." ".$row['Type']." à compter du ".$date_deb->format('d-m-Y');?></td>
					<?php }elseif ($status =='Validée'){ ?><tr style="background-color:lime;">
						<td><?php echo $row['NbEngage']." ".$row['Type']." à compter du ".$date_deb->format('d-m-Y');?></td>
						<?php }elseif ($status =='En attente'){ ?><tr   style="background-color:orange;"> 
							<td onclick ="window.location 	='demandes.php'"><?php echo $row['NbEngage']." ".$row['Type']." à compter du ".$date_deb->format('d-m-Y');?></td>
						</tr>
					<?php }
				}
				?>
			</table>
			<a href="historique.php" class="btn btn-primary btn-block">Historique</a>
		</div>
	</div>