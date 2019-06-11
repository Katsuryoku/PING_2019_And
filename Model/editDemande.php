<?php
    if (isset($_POST["id"])) {
    
        
        include ("C:/wamp64/www/PING_2019_And-Mercier/Tests/testMail2/sendMailNotif.php");
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
            sendMailNote($id,"EM");
        }   
        else
        {
            error_reporting(2);
            include("connect.php");
            
            $id = $_POST["id"];
            sendMailNote($id,"ES");
            $query = "DELETE FROM demande WHERE iddemande = ".$id;

            var_dump($query);
            mysqli_query($con, $query);
            
        }
        
    
    //echo($_POST["id"]);
    }   
?>