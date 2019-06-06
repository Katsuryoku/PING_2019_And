<html>
<head>
	<meta charset="utf-8" />
	<title>Mettre à jour les CP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<script src="navbar.js"></script>
	
</head>
<body>
	<div data-include="navbar"></div>
	<h1></h1>
<?php
session_start();
if (isset($_SESSION['varname'])){
$var_value = $_SESSION['varname'];
	if($var_value == "WORKED"){
		?>
		<script> alert("La base de donnée a été importée.")</script>
		<?php
}else{
		?>
		<script> alert("Il y a eu un problème dans l'importation.")</script>
		<?php

}
session_destroy();
}
?>
<form action="../../Model/addExcel.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Load a excel" name="submit">
</form>

</body>
</html>