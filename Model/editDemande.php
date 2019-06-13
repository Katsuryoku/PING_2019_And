<?php
include("connect.php");
 include ("sendMailNotif.php");
    if (isset($_POST["id"])) {
        
        if(isset($_POST["Date"]))
        {
            $x=error_reporting(2);
            //echo($_POST["id"]);
            $id = $_POST["id"];
            $Date = $_POST["Date"];
            $NbJours = $_POST["NbJours"];
            
            $query = 'UPDATE demande SET Date_deb = "'.$Date.'", NbEngage ="'.$NbJours.'",Prevalide =0,Valide=0,viewByManager = 0, viewByRH = 0  WHERE iddemande = '.$id;
            //var_dump($query);
            var_dump($x);
            mysqli_query($con, $query);
            sendMailNote($id,"EM");
        }   
        else
        {
            error_reporting(2);
            
            
            $id = $_POST["id"];
            sendMailNote($id,"ES");
            $query = "DELETE FROM demande WHERE iddemande = ".$id;

            var_dump($query);
            mysqli_query($con, $query);
            
        }
        
    
    //echo($_POST["id"]);
    }   
?>