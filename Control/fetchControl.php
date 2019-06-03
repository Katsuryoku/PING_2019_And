<?php
include('../Model/fetch.php');
$data = '';
fetch($_POST["view"],"demande","viewByManager","iddemande", $con);
?>