<?php
include('../Model/fetch.php');
$data = '';
if (isset($_POST["View"])){
fetch($_POST["view"],"demande","viewByEmployee","iddemande", $con, '', "64");
}else{
	fetch('',"demande","viewByEmployee","iddemande", $con, '', "64");
}

?>