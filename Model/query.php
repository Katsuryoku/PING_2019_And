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
		elseif ($type == "RH"){
			$query = "SELECT MailPro FROM salarie WHERE Categorie='RRH'";
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
		$query = "SELECT Nom FROM typedemande JOIN demande ON typedemande.idtype=demande.idtype WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["Nom"];
	}
	function queryType2($id){
		include "connect.php";
		$query = "SELECT Nom FROM typedemande WHERE idtype=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["Nom"];
	}
	function queryMotif($id){
		include "connect.php";
		echo $query = "SELECT MotifRefus FROM demande WHERE iddemande=".$id;
		$result = mysqli_query($con,$query);
		$row = mysqli_fetch_array($result);
		return $row["MotifRefus"];
	}
	
	function queryRH($id){
		include "connect.php";
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