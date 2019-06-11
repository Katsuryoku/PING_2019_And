<?php
	
	function queryMails($id, $type)
	{
		include "connect.php";
		if ($type == "Employe"){
			$query = "SELECT MailPro FROM salarie JOIN demande ON salarie.idsalaries=demande.idsalaries WHERE iddemande=".$id; 
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_array($result);
			return $row["MailPro"];
		}
		elseif ($type == "Manager"){
			$query = "SELECT MailPro FROM salarie JOIN demande ON salarie.idsalaries=demande.idRespHier WHERE iddemande=".$id;
			$result = mysqli_query($con,$query);
			$row = mysqli_fetch_array($result);
			return $row["MailPro"];
		}
	}
	function queryDate($id){
		include "connect.php";
		$query = "SELECT Date_deb FROM demande WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["Date_deb"];
	}

	function queryType($id){
		include "connect.php";
		$query = "SELECT idtype FROM demande WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["idtype"];
	}
	function queryMotif($id){
		include "connect.php";
		echo $query = "SELECT MotifRefus FROM demande WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["MotifRefus"];
	}
	
	function queryRH($id){
		include "../../View/RH/connect.php";
		$query = "SELECT Prevalide FROM demande WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["Prevalide"];
	}
	
	// var_dump(queryRH(1)) ;
	// var_dump(queryMotif(1));
	// var_dump(queryType(1));
	// var_dump(queryDate(1));
	// queryMails(1,"Employe");
	// queryMails(1,"Manager");
?>