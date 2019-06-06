<?php
    if (isset($_POST["id"])) {
    
        include ("../testMail2/sendMail.php");

        if(isset($_POST["Date"]))
        {
            $x=error_reporting(2);
            include("connect.php");
            //echo($_POST["id"]);
            $id = $_POST["id"];
            $Date = $_POST["Date"];
            $NbJours = $_POST["NbJours"];
            
            $query = 'UPDATE demande SET Date_deb = "'.$Date.'", NbEngage ="'.$NbJours.'",viewByManager = 0, viewByRH = 0  WHERE iddemande = '.$id;
            //var_dump($query);
            var_dump($x);
            mysqli_query($con, $query);
            sendMailNotif($id,"EM");
        }   
        else
        {
            error_reporting(2);
            include("connect.php");
            
            $id = $_POST["id"];
            
            $query = "DELETE FROM demande WHERE iddemande = ".$id;

            var_dump($query);
            mysqli_query($con, $query);
            sendMailNotif($id,"ES");
        }
        
    
    //echo($_POST["id"]);
    }   
?>