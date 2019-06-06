<?php
  include('connect.php');
    if(isset($_GET)){
      $id = $_GET["id"];
      $query = "SELECT * FROM demande WHERE idsalaries =".$id;
      $result = mysqli_query($con, $query);
      $output = '';
      while($row = mysqli_fetch_array($result))
        {
          $output .='<tr><td>'.$row["iddemande"].'</td><td>'.$row["idtype"].'</td><td>'.$row["idsalaries"].'</td><td>'.$row["idRespHier"].'</td><td>'.$row["Date_deb"].'</td><td>'.$row["NbEngage"].'</td><td><button onclick="Modify('.$row["iddemande"].')">Modifier</button><button onclick = "Delete('.$row["iddemande"].')">Supprimer</button></td></tr>';
        }

      $data = array(
         'demande' => $output,
      );
     // echo var_dump($data);
      echo json_encode($data);
   }
?>