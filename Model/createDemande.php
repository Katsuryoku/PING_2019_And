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
		$NbEngage = dateDiff($startDate,$endDate,$idtype);
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
		$DateToday = new DateTime();
		$DateToday = $DateToday->format("Y-m-d");
		//var_dump($demiJournee);
		//var_dump($NbEngage);
		
		//var_dump($NbEngage);
		$query = "INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`,`Date_envoie`,`Date_resFina`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES (NULL, ".$idtype.", ".$idsalaries.", ".$idRespHier.", '".$deb."','".$DateToday."', NULL, ".$demiJournee.", ".$NbEngage.", '0', '0', NULL, NULL, '0', '0', '0')";
		//var_dump($query);
		$result = mysqli_query($con, $query);

		//include "sendMailNotif.php";
		$queryE = "SELECT max(iddemande) FROM demande";
		$resultE = mysqli_query($con, $queryE);
		$rowE = mysqli_fetch_array($resultE);
		//var_dump($rowE);
		$id = $rowE["max(iddemande)"];
		echo json_encode("worked");

	}
}

function dateDiff($date1, $date2,$idtype){
	if ($idtype == 2){
		$Date_deb = strtotime($date1);
		$Date_end = strtotime($date2);
		$diff = abs($Date_deb - $Date_end); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
		$retour = array();
		$tmp = $diff;
		$retour['second'] = $tmp % 60;

		$tmp = floor( ($tmp - $retour['second']) /60 );
		$retour['minute'] = $tmp % 60;

		$tmp = floor( ($tmp - $retour['minute'])/60 );
		$retour['hour'] = $tmp % 24;

		$tmp = floor( ($tmp - $retour['hour'])  /24 );
		$retour['day'] = $tmp+1;
		return $retour;
	}else{
		// https://stackoverflow.com/questions/12365461/day-difference-without-weekends
		$startDate = new DateTime($date1);
		$endDate = new DateTime($date2);
		$isWeekday = function ($date) {
			return $date->format('N') < 6;
		};

		$days = $isWeekday($endDate) ? 1 : 0;
		while($startDate->diff($endDate)->days > 0) {
			$days += $isWeekday($startDate) ? 1 : 0;
			$startDate = $startDate->add(new DateInterval("P1D"));
		}
		$retour = array();
		$retour['day'] = $days;
		return $retour;
	}
}
?>