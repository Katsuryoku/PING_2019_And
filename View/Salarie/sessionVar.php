<?php 
	session_start()
	if (isset($_POST["startDate"])) {

		$startDate=$_POST["startDate"];
		$endDate=$_POST["endDate"];

		$_SESSION["startDate"]=$startDate;
		$_SESSION["endDate"]=$endDate;
	}

 ?>