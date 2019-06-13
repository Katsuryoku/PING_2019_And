<?php
include('../Model/fetch.php');

fetch($_POST["view"],"demande","viewByManager","iddemande", $con, "64");

?>