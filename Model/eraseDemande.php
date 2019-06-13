
<?php  
if (isset($_POST["id"])) {
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