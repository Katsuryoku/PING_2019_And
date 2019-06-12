<?php
if(isset($_SESSION)) {
	$log= $_SESSION["login"];
}else{
	session_start();
	$log= $_SESSION["login"];
}
$host = 'localhost';
$dbname = 'andrice';
$ndc = 'root';
$password = '';
$con = mysqli_connect($host, $ndc, "", $dbname) or die('Erreur connexion');
$stmt3 = $con->prepare("SELECT idsalaries FROM salarie WHERE login=?");
$stmt3->bind_param("s", $log);
$stmt3->execute();
$stmt3->bind_result($idsalarie);
$stmt3->fetch();
$stmt3->close();
?>