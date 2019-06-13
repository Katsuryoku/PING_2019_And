<?php
session_start();
if (!isset($_POST["type"]))
{
	$idtype = '301';
}else{
	$idtype= $_POST["type"];
}	
$_SESSION["idtype"] = $idtype;
echo json_encode($idtype);
?>