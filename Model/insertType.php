<?php
include("accessBDD.php");
if(isset($_POST["id"]))
{
$id = $_POST["id"];
$name = $_POST["name"];
$desc = $_POST["desc"];
$query = "INSERT INTO typedemande (`idtype`, `Nom`, `Descriptif`,`status`) VALUES (".$id.", ".$name.", ".$desc.", 0)";
mysqli_query($con, $query);
/*
$id = $_POST["id"];
$name = $_POST["name"];
$desc = $_POST["desc"];
insertType($id,$name,$desc);*/
}
?>