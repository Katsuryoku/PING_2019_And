<?php
  include('connect.php');
    if(isset($_GET)){
      $query = "SELECT * FROM demande WHERE Prevalide = 1 AND Valide = 0 AND MotifRefus is Null";
      $result = mysqli_query($con, $query);
      $output = '';
      while($row = mysqli_fetch_array($result))
        {
          $output .='<tr><td>'.$row["iddemande"].'</td><td>'.$row["idtype"].'</td><td>'.$row["idsalaries"].'</td><td>'.$row["idRespHier"].'</td><td>'.$row["Date_deb"].'</td><td>'.$row["NbEngage"].'</td><td><button onclick="Accept('.$row["iddemande"].')">Accept</button><button onclick = "Refuse('.$row["iddemande"].')">Refuse</button></td></tr>';
        }

      $data = array(
         'demande' => $output,
      );
     // echo var_dump($data);
      echo json_encode($data);
   }
?>