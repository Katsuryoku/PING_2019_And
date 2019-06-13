<?php
if (isset($_POST["startDate"]))
{
	$startDate = $_POST["startDate"];
	$endDate = $_POST["endDate"];
	$demiDeb = $_POST["demiDeb"];
	$demiFin = $_POST["demiFin"];
}else{
	$startDate = "20-10-2019";
	$endDate = "21-10-2019";
	$demiDeb = "FALSE";
	$demiFin = "FALSE";
}
include('../Model/createDemande.php');
	$idtype= $_SESSION["idtype"];

createDemande($con,$startDate,$endDate,$demiDeb,$demiFin,$log,$idtype);
?>