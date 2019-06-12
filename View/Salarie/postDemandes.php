<?php 
	session_start();

	if (isset($_POST["idtype"])){

		$idtype = $_POST["idtype"];
		
		$queryS = "SELECT * FROM salarie WHERE login =".$_SESSION["login"];
	    $resultS = mysqli_query($con, $queryS);
	    $rowS = mysqli_fetch_array($resultS);

		$idsalaries = $rowS["idsalaries"];
		$idRespHier = $rowS["idRespHier"];
		$Date_deb = $_SESSION["startDate"];
		$demiJournee = $_SESSION["demiJournee"];
		$NbEngage = $_SESSION["endDate"]-$_SESSION["startDate"];

		$query = "INSERT INTO `demande` (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `demiJournee`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`, `viewByManager`, `viewByRH`, `viewByEmployee`) VALUES (NULL, ".$idtype.", ".$idsalaries.", ".$idRespHier.", ".$Date_deb.", ".$demiJournee.", ".$NbEngage.", '0', '0', NULL, NULL, '0', '0', '0')";

	}

 ?>