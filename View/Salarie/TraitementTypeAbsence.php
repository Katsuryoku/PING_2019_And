<?php
mb_internal_encoding('UTF-8');

$db = mysqli_connect('localhost','root','','andrice') or die('Erreur connexion');
mysqli_query($db,"set names utf8") or die (mysqli_error());
$stmt3 = $db->prepare("SELECT Descriptif FROM typedemande WHERE idtype=?");

$type= $_GET['type'];

	$stmt3->bind_param("s", $type);
	$stmt3->execute();

	 $stmt3->bind_result($descriptif);
	  $stmt3->fetch();
	  $stmt3->close();
	  echo $descriptif;

?>