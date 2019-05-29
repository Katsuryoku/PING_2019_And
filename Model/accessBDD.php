<?php

// retourne la réponse de la base de donnée à un access par id sur une base
function accessBDD($id,$base,$cond = "",$limit = 1,$fetch= TRUE){
	private $host = 'localhost';
	private $dbname = 'andrice';
	private $ndc = 'root';
	private $password = '';
	private $bdd = new PDO($host);
/**
* Connexion à la base de donnée
**/
try
{
	$bdd = new PDO('mysql:'.$host.'=localhost;dbname='.$dbname.';charset=utf8', $ndc, $password);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
if ($id != ""){
	switch ($base){
		case "SOLDE":
	// `ACQUISCPN-1` , `PRISCPN-1` , `SOLDECPN-1` , `ACQUISCPN` , `PRISCPN` , `SOLDECPN` , `ACQUISJRRCR` , `PRISJRRCR` , `SOLDEJRRCR`
		$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT ".$limit);
		break;
		case "DEMANDE":
	//`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`
		$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`iddemande` =".$id." LIMIT ".$limit);
		break;
		case "TYPEDEMANDE":
	//`idtype`, `Nom`, `Descriptif`
		$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idtype` =".$id." LIMIT ".$limit);
		break;
		case "SALARIE":
	// `idsalaries`, `Nom`, `Prenom`, `Trigramme`, `Nationalite`, `Date_Naissance`, `Lieu_Naissance`, `Dept_Naissance`, `Sexe`, `N_SS`, `Famille`, `Statut`, `Categorie`, `SalFixe`, `Date_Entre`, `Date_Sortie`, `NumTelPerso`, `NumTelPro`, `MailPro`, `Position`, `login`, `mdp`, `mdpTmp`, `mdpIntra`, `mdpTmpIntra`, `idRespHier`, `SituationMarital`, `EnfantAcharge`
		$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT ".$limit);
		break;
	}
}else{
	// `ACQUISCPN-1` , `PRISCPN-1` , `SOLDECPN-1` , `ACQUISCPN` , `PRISCPN` , `SOLDECPN` , `ACQUISJRRCR` , `PRISJRRCR` , `SOLDEJRRCR`
	
	if ($cond != ""){
		$reponse = $bdd->query("SELECT * FROM ".$base." where ".$cond);
	}else{
		$reponse = $bdd->query("SELECT * FROM ".$base." LIMIT ".$limit);
	}
}
if ($fetch = TRUE){
	$donnees = $reponse->fetch();
	return $donnees;
}else{
	return $reponse;
}

}


function insertType($id,$name,$desc){
	$host = 'localhost';
	$dbname = 'andrice';
	$ndc = 'root';
	$password = '';
/**
* Connexion à la base de donnée
**/
try
{
	$bdd = new PDO('mysql:'.$host.'=localhost;dbname='.$dbname.';charset=utf8', $ndc, $password);
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
	echo "<script> alert(Erreur : ".$e->getMessage().")</script>";
}	
$query = "INSERT INTO typedemande (`idtype`, `Nom`, `Descriptif`,`status`) VALUES (".$id.", ".$name.", ".$desc.", 0)";
$bdd->exec($query);
echo "<script> alert(Erreur : done) </script>";
}


function updateStatu($base,$attr){
	$host = 'localhost';
	$dbname = 'andrice';
	$ndc = 'root';
	$password = '';
	try
	{
		$bdd = new PDO('mysql:'.$host.'=localhost;dbname='.$dbname.';charset=utf8', $ndc, $password);
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	$query = "UPDATE ".$base." SET ".$attr." = 1 WHERE ".$attr."=0";
	$bdd->exec($query);
}