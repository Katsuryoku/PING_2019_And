<?php

	$login=$_POST['login'];
	$password=$_POST['password'];
	echo $login;
	session_start();

	$_SESSION['login']=$login;
	$_SESSION['password']=$password;
	echo json_encode($login);
		
	

?>