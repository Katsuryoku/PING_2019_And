<?php
// retourne la réponse de la base de donnée à un access par id sur une base
function accessBDD($id,$base){
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
}
switch ($base){
	case "SOLDE":
	// `ACQUISCPN-1` , `PRISCPN-1` , `SOLDECPN-1` , `ACQUISCPN` , `PRISCPN` , `SOLDECPN` , `ACQUISJRRCR` , `PRISJRRCR` , `SOLDEJRRCR`
	$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT 1");
	break;
	case "DEMANDE":
	//`iddemande`, `idtype`, `idsalaries`, `idRespHier`, `Date_deb`, `NbEngage`, `Prevalide`, `Valide`, `MotifRefus`, `idjustif`
	$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`iddemande` =".$id." LIMIT 1");
	break;
	case "TYPEDEMANDE":
	//`idtype`, `Nom`, `Descriptif`
	$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idtype` =".$id." LIMIT 1");
	break;
	case "SALARIE":
	// `idsalaries`, `Nom`, `Prenom`, `Trigramme`, `Nationalite`, `Date_Naissance`, `Lieu_Naissance`, `Dept_Naissance`, `Sexe`, `N_SS`, `Famille`, `Statut`, `Categorie`, `SalFixe`, `Date_Entre`, `Date_Sortie`, `NumTelPerso`, `NumTelPro`, `MailPro`, `Position`, `login`, `mdp`, `mdpTmp`, `mdpIntra`, `mdpTmpIntra`, `idRespHier`, `SituationMarital`, `EnfantAcharge`
	$reponse = $bdd->query("SELECT * FROM ".$base." WHERE ".$base.".`idsalaries` =".$id." LIMIT 1");
	break;
}
$donnees = $reponse->fetch();
//$reponse->closeCursor();
return $donnees;
}
