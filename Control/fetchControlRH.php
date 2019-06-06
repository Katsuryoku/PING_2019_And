<?php
include('../Model/fetch.php');
$data = '';
fetch($_POST["view"],"demande","viewByRH","iddemande", $con);
?>