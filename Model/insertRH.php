<?php

    if (isset($_POST["id"])) { 
           
        include ("sendMailNotif.php");
        include("connect.php");
        if(isset($_POST["Motif"]))
        {
            //echo($_POST["id"]);
            $id = $_POST["id"];
            $Motif = $_POST["Motif"];
            $DateFinal = new DateTime();
            $DateFinal = $DateFinal->format("Y-m-d");
            $query = 'UPDATE demande SET MotifRefus = "'.$Motif.'", Date_resFina = "'.$DateFinal.'" WHERE iddemande = '.$id;
            mysqli_query($con, $query);
            echo "<script> window.close();</script>";
            sendMailNote($id,"RR");
            
        }   
        else
        {            

            $id = $_POST["id"];
            $DateFinal = new DateTime();
            $DateFinal = $DateFinal->format("Y-m-d");
            $query = "UPDATE demande SET Valide = 1 , Date_resFina = '".$DateFinal."' WHERE iddemande = ".$id;

            // var_dump($query);
            mysqli_query($con, $query);
            sendMailNote($id,"MA");
        }
        
    
    //echo($_POST["id"]);
    }   
?>