<?php
    if (isset($_POST["Motif"])) {
    

        if(isset($_POST["Motif"]))
        {
            $x=error_reporting(2);
            include("connect.php");
            //echo($_POST["id"]);
            $id = $_POST["id"];
            $Motif = $_POST["Motif"];
            
            $query = 'UPDATE demande SET MotifRefus = "'.$Motif.'" WHERE iddemande = '.$id;
            mysqli_query($con, $query);
            echo "<script> window.close();</script>";
            
        }   
        else
        {
            error_reporting(2);
            include("connect.php");
            
            $id = $_POST["id"];
            
            $query = "UPDATE demande SET Valide = 1 WHERE iddemande = ".$id;

            var_dump($query);
            mysqli_query($con, $query);
        }
        
    
    //echo($_POST["id"]);
    }   
?>