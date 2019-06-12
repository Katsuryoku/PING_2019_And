<?php 
	session_start();

	include "../../Model/connect.php";
	if (isset($_POST["type"])){

		$idtype= $_POST["type"];

		$_SESSION["idtype"] = $idtype;	
		var_dump($_SESSION["idtype"] );
	}

	if (isset($_POST["startDate"])) {

		$login = $_SESSION["login"];
		// var_dump($login);
		$queryS = "SELECT * FROM salarie WHERE login = '".$login."'";
	    $resultS = mysqli_query($con, $queryS);
	    $rowS = mysqli_fetch_array($resultS);
	    $deb = $_POST["startDate"];
	    $end = $_POST["endDate"];

		$Date_deb = strtotime($deb);
		$Date_end = strtotime($end);
		$deb= new DateTime($deb);
		$deb = $deb->format("Y-m-d");
		var_dump($deb);

		$idtype= $_SESSION["idtype"];
		$idsalaries = $rowS["idsalaries"];
		$idRespHier = $rowS["idRespHier"];
		$NbEngage = dateDiff($Date_end,$Date_deb);
		$NbEngage = $NbEngage["day"];
		
		var_dump($_POST["demiDeb"])	;
		var_dump($_POST["demiFin"])	;
		if($_POST["demiDeb"]){
			$demiJournee = true;
			if($_POST["demiFin"]){
				$NbEngage=$NbEngage-1;
			}else{
				$NbEngage=$NbEngage-0.5;
			}

		}else{
			$demiJournee = false;
			if($_POST["demiFin"]){
				$NbEngage=$NbEngage-0.5;
			}
		}

		
		
		// var_dump($NbEngage);
		$query = "INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES (NULL, ".$idtype.", ".$idsalaries.", ".$idRespHier.", '".$deb."', ".$demiJournee.", ".$NbEngage.", '0', '0', NULL, NULL, '0', '0', '0')";
		var_dump($query);
		$result = mysqli_query($con, $query);

		include "../../Model/sendMailNotif.php";
		$queryE = "SELECT * FROM demande WHERE iddemande = MAX(iddemande)";
		$resultE = mysqli_query($con, $query);
		$rowE = mysqli_fetch_array($resultE);
		$id = $rowE["iddemande"];
		sendMailNote($id,"EE");


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