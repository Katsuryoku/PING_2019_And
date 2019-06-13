<?php
if (isset($_POST["start"]))
{
	$id = $_POST["id"];
	$startDate = $_POST["start"];
	$endDate = $_POST["end"];
	$demiDeb = $_POST["demiDeb"];
	$demiFin = $_POST["demiFin"];
}
include('../Model/editDemande.php');
$idtype= $_SESSION["idtype"];

ModifDemande($con,$id,$startDate,$endDate,$demiDeb,$demiFin,$log,$idtype);
?>