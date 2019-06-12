<?php
include('access.php');

$stmt2 = $con->prepare("SELECT sexe FROM salarie WHERE login=?");
$stmt2->bind_param("s", $log);
$stmt2->execute();
$stmt2->bind_result($genre);
$stmt2->fetch();
$stmt2->close();
			// on crée la requete SQL 
$query = "SELECT salarie.Nom as Nom,Prenom,DATE_FORMAT(Date_deb, '%d-%m-%Y') as Date_deb, NbEngage , typedemande.Nom as Type, Valide, MotifRefus, SOLDECPN, SOLDEJRRCR FROM demande JOIN salarie on demande.idsalaries = salarie.idsalaries JOIN solde on demande.idsalaries = solde.idsalaries JOIN typedemande on demande.idtype = typedemande.idtype";

						// on envoie la requête 
$result = mysqli_query($con, $query);


?>