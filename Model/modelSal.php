<?php
include('access.php');
$stmt = $con->prepare("SELECT `SOLDECPN-1`,PRISCPN,SOLDECPN,ACQUISJRRCR,PRISJRRCR,SOLDEJRRCR FROM solde JOIN salarie ON solde.idsalaries=salarie.idsalaries WHERE login=?");
$stmt->bind_param("s", $log);
$stmt->execute();
$stmt->bind_result($soldeCpnm1,$prisCpn,$soldeCpn,$acquisJRRCR,$prisJRRCR,$soldeJRRCR);
$stmt->fetch();
$stmt->close();

$stmt2 = $con->prepare("SELECT sexe FROM salarie WHERE login=?");
$stmt2->bind_param("s", $log);
$stmt2->execute();
$stmt2->bind_result($genre);
$stmt2->fetch();
$stmt2->close();
			// on crée la requete SQL 
$query = "SELECT DATE_FORMAT(Date_envoie, '%d-%m-%Y') as Date_envoie, DATE_FORMAT(Date_resFina, '%d-%m-%Y') as Date_resFina, DATE_FORMAT(Date_deb, '%d-%m-%Y') as Date_deb, NbEngage , typedemande.Nom as Type, Valide, MotifRefus FROM demande JOIN typedemande on demande.idtype = typedemande.idtype WHERE demande.idsalaries = ".$idsalarie." ORDER BY Date_deb DESC LIMIT 3";
			// on envoie la requête 
$result = mysqli_query($con, $query);


?>