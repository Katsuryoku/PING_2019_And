<?php
	
	function queryMails($id, $type)
	{
		if ($type == "Employe"){
			echo $query = "SELECT MailPro FROM salarie JOIN demandes ON idsalaries.salarie=idsalaries.demandes WHERE iddemande=".$id;
		}
		if ($type == "Manager"){
			echo $query = "SELECT MailPro FROM salarie JOIN demandes ON idsalaries.salarie=idRespHier.demandes WHERE iddemande=".$id;
		}
	}
	function queryDate($id){
		echo $query = "SELECT Date_deb FROM demandes WHERE iddemande=".$id;
	}

	function queryType($id){
		echo $query = "SELECT idtype FROM demandes WHERE iddemande=".$id;
	}
	function queryMotif($id){
		echo $query = "SELECT MotifRefus FROM demandes WHERE iddemande=".$id;
	}
	
	function queryRH($id){
		echo $query = "SELECT Prevalide FROM demandes WHERE iddemande=".$id;
	}
	
	

?>