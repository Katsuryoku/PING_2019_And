<?php 
include "connect.php";

function createDemande($con,$startDate,$endDate,$demiDeb,$demiFin, $login, $idtype){
	if (isset($startDate)) {
		$queryS = "SELECT * FROM salarie WHERE login = '".$login."'";
		$resultS = mysqli_query($con, $queryS);
		$rowS = mysqli_fetch_array($resultS);
		$idsalaries = $rowS["idsalaries"];
		$idRespHier = $rowS["idRespHier"];

		$deb = $startDate;
		$end = $endDate;

		$Date_deb = strtotime($deb);
		$Date_end = strtotime($end);
		$deb= new DateTime($deb);
		$deb = $deb->format("Y-m-d");
		//var_dump($deb);
		$NbEngage = dateDiff($Date_end,$Date_deb);
		$NbEngage = (float)$NbEngage["day"];
		//var_dump($demiDeb);
		//var_dump($demiFin);
		//var_dump($NbEngage);
		//echo $demiDeb;
		if($demiDeb=="true" && $demiFin=="true"){
			$demiJournee = true;
			$NbEngage=$NbEngage-1;
		}
		elseif($demiDeb!="true" && $demiFin=="true"){
			$demiJournee = false;
			$NbEngage=$NbEngage-0.5;
		}
		elseif($demiDeb=="true" && $demiFin!="true"){
			$demiJournee = true;
			$NbEngage=$NbEngage-0.5;
		}
		elseif($demiDeb!="true" && $demiFin!="true"){
			$demiJournee = false;
		}
		if($demiJournee){
			$demiJournee=1;
		}else{
			$demiJournee=0;
		}
		var_dump($demiJournee);
		var_dump($NbEngage);
		
		
		var_dump($NbEngage);
		$query = "INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES (NULL, ".$idtype.", ".$idsalaries.", ".$idRespHier.", '".$deb."', ".$demiJournee.", ".$NbEngage.", '0', '0', NULL, NULL, '0', '0', '0')";
		var_dump($query);
		$result = mysqli_query($con, $query);

		//include "sendMailNotif.php";
		$queryE = "SELECT max(iddemande) FROM demande";
		$resultE = mysqli_query($con, $queryE);
		$rowE = mysqli_fetch_array($resultE);
		var_dump($rowE);
		$id = $rowE["max(iddemande)"];
		echo json_encode("worked");

	}
}

function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();

    $tmp = $diff;
    $retour['second'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;

    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;

    return $retour;
}
?>