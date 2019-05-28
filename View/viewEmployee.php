<?php
$id = 55;

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
};

$reponse = $bdd->query("SELECT * FROM solde WHERE `solde`.`idsalaries` =".$id);
$donnees = $reponse->fetch()
//$query = "UPDATE solde SET `ACQUISCPN-1` = ".$acquisCPN_1.", `PRISCPN-1` = ".$prisCPN_1.", `SOLDECPN-1` = ".$soldeCPN_1.", `ACQUISCPN` = ".$acquisCPN.", `PRISCPN` = ".$prisCPN.", `SOLDECPN` = ".$soldeCPN.", `ACQUISJRRCR` = ".$acquisJRRCR.", `PRISJRRCR` = ".$prisJRRCR.", `SOLDEJRRCR` = ".$soldeJRRCR." WHERE `solde`.`idsalaries` =".$id;
//		var_dump($donnees);
?>
<html>
<head>
	<title>Employee page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- Le dernier css traité est celui qui définie la norme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="viewEmployee.css" type="text/css" media="all" />
</head>

<body>
	<div id="SOLDE">
		<div id="SOLDECPN">
				<?php
				echo $donnees['SOLDECPN'];
				?>
		</div>
		<div id="soldeCPN_1">
			<H1>
				<?php
				echo $donnees['SOLDECPN-1'];
				?>
			</H1>
		</div>
		<div id="PRISCPN">
			<H1>
				<?php
				echo $donnees['PRISCPN'];
				?>
			</H1>
		</div>
		<div id="buttonDemande">
			<button type="button" class="btn btn-sm btn-danger">Demande</button>
		</div>
	</div>
</body>
</html>