<?php
$host = 'localhost';
$dbname = 'andrice';
$ndc = 'root';
$password = '';
$con = mysqli_connect($host, $ndc, "", $dbname);
$webView = "manager";
function getQueryByID($id,$base,$limit = 1){
	switch ($base){
		case "SOLDE":
	// `ACQUISCPN-1` , `PRISCPN-1` , `SOLDECPN-1` , `ACQUISCPN` , `PRISCPN` , `SOLDECPN` , `ACQUISJRRCR` , `PRISJRRCR` , `SOLDEJRRCR`
		return "SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT ".$limit;
		break;
		case "DEMANDE":
	//`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`
		return "SELECT * FROM ".$base." WHERE ".$base.".`iddemande` =".$id." LIMIT ".$limit;
		break;
		case "TYPEDEMANDE":
	//`idtype`, `Nom`, `Descriptif`
		return "SELECT * FROM ".$base." WHERE ".$base.".`idtype` =".$id." LIMIT ".$limit;
		break;
		case "SALARIE":
	// `idsalaries`, `Nom`, `Prenom`, `Trigramme`, `Nationalite`, `Date_Naissance`, `Lieu_Naissance`, `Dept_Naissance`, `Sexe`, `N_SS`, `Famille`, `Statut`, `Categorie`, `SalFixe`, `Date_Entre`, `Date_Sortie`, `NumTelPerso`, `NumTelPro`, `MailPro`, `Position`, `login`, `mdp`, `mdpTmp`, `mdpIntra`, `mdpTmpIntra`, `idRespHier`, `SituationMarital`, `EnfantAcharge`
		return "SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT ".$limit;
		break;
	}
}

function getQueryByCond($base,$cond){

	return "SELECT * FROM ".$base." ".$cond;
}
function getQueryInsertDemande($iddemande,$idtype,$idsalaries,$idRespHier,$Date_deb,$NbEngage,$idjustif){	
	return "INSERT INTO DEMANDE (`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`) VALUES (".$iddemande.", ".$idtype.", ".$idsalaries.", ".$idRespHier.", ".$Date_deb.", ".$NbEngage.", FALSE, FALSE, '', ".$idjustif.")";
}


function getQueryUpdate($base,$attr){
	return "UPDATE ".$base." SET ".$attr." = 1 WHERE ".$attr."=0";
}