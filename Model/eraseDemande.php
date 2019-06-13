
<?php  
include "connect.php";
include ("sendMailNotif.php");
if (isset($_POST["id"])) {
        {      
            $id = $_POST["id"];
            var_dump($id);
            sendMailNote($id,"ES");
            $query = "DELETE FROM demande WHERE iddemande = ".$id;

            var_dump($query);
            mysqli_query($con, $query);
            
        }
        
    
    //echo($_POST["id"]);
    } 
?>