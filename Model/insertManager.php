<?php
    if (isset($_POST["id"])) {
        include ("C:/wamp64/www/PING_2019_And-Mercier/Tests/testMail2/sendMailNotif.php");
        include("connect.php");

        if(isset($_POST["Motif"]))
        {
            $id = $_POST["id"];
            $Motif = $_POST["Motif"];
            
            $query = 'UPDATE demande SET MotifRefus = "'.$Motif.'" WHERE iddemande = '.$id;
            //var_dump($query);
            //var_dump($x);
            mysqli_query($con, $query);
            echo "<script> window.close();</script>";
            sendMailNote($id,"MR");
            
        }   
        else
        {         
            
            $id = $_POST["id"];
            
            $query = "UPDATE demande SET Prevalide = 1 WHERE iddemande = ".$id;

            // var_dump($query);
            mysqli_query($con, $query);
            sendMailNote($id,"MA");
        }
        
    
    //echo($_POST["id"]);
    }   
?>