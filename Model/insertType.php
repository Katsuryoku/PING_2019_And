<?php
if(isset($_POST["id"]))
{
//include("accessBDD.php");

$con = mysqli_connect("localhost:3306", "root", "", "andrice");
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