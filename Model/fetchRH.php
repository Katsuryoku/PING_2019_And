<?php
  include('connect.php');
  include('query.php');
    if(isset($_GET)){
      $queryView = "UPDATE demande SET viewByRH = 1 WHERE Prevalide = 1 AND viewByRH = 0";
      mysqli_query($con, $queryView);
      
      $query = "SELECT * FROM demande WHERE Prevalide = 1 AND Valide = 0 AND MotifRefus is Null";
      $result = mysqli_query($con, $query);
      $output = '';

      

      while($row = mysqli_fetch_array($result))
        {
          $queryS = "SELECT * FROM salarie WHERE idsalaries =".$row["idsalaries"];
          $resultS = mysqli_query($con, $queryS);
          $rowS = mysqli_fetch_array($resultS);

          $queryM = "SELECT * FROM salarie WHERE idsalaries =".$row["idRespHier"];
          $resultM = mysqli_query($con, $queryM);
          $rowM = mysqli_fetch_array($resultM);

          $output .='<tr><td>'.$row["iddemande"].'</td><td>'.queryType2($row["idtype"]).'</td><td>'.$rowS["Nom"].' '.$rowS["Prenom"].'</td><td>'.$rowM["Nom"].' '.$rowM["Prenom"].'</td><td>'.$row["Date_deb"].'</td><td>'.$row["Date_envoie"].'</td><td>'.$row["NbEngage"].'</td><td><button onclick="Accept('.$row["iddemande"].')">Accept</button><button onclick = "Refuse('.$row["iddemande"].')">Refuse</button></td></tr>';
        }

      $data = array(
         'demande' => $output,
      );
     // echo var_dump($data);
      echo json_encode($data);
   }
?>