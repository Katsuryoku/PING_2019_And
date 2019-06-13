<?php
	include "connect.php";
		$id = $_POST["id"];
	$stmt3 = $con->prepare("SELECT idtype FROM demande WHERE iddemande=?");
$stmt3->bind_param("s", $id);
$stmt3->execute();
$stmt3->bind_result($idtype);
$stmt3->fetch();
$stmt3->close();
	echo json_encode($idtype);
?>