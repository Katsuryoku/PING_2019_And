<html>
<body>
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
<form action="../Model/addExcel.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Load a excel" name="submit">
</form>

</body>
</html>