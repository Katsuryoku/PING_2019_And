<?php

    if (isset($_POST["id"])) { 
           
        include ("C:/wamp64/www/PING_2019_And-Mercier/Tests/testMail2/sendMailNotif.php");
        include("connect.php");
        if(isset($_POST["Motif"]))
        {
            //echo($_POST["id"]);
            $id = $_POST["id"];
            $Motif = $_POST["Motif"];
            
            $query = 'UPDATE demande SET MotifRefus = "'.$Motif.'" WHERE iddemande = '.$id;
            mysqli_query($con, $query);
            echo "<script> window.close();</script>";
            sendMailNote($id,"RR");
            
        }   
        else
        {            

            $id = $_POST["id"];
            
            $query = "UPDATE demande SET Valide = 1 WHERE iddemande = ".$id;

            // var_dump($query);
            mysqli_query($con, $query);
            sendMailNote($id,"MA");
        }
        
    
    //echo($_POST["id"]);
    }   
?>