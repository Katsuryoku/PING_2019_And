<?php
  include('connect.php');
  include 'query.php';
    if(isset($_GET)){
      $id = $idsalarie;
      $query = "SELECT * FROM demande WHERE Valide = 0 AND MotifRefus is Null AND idsalaries =".$id;
      $result = mysqli_query($con, $query);
      $output = '';
      $queryS = "SELECT * FROM salarie WHERE idsalaries =".$id;
      $queryM = "SELECT * FROM salarie WHERE idsalaries IN (SELECT idRespHier FROM salarie WHERE idsalaries =".$id.")";
      $resultS = mysqli_query($con, $queryS);
      $resultM = mysqli_query($con, $queryM);
      $rowS = mysqli_fetch_array($resultS);
      $rowM = mysqli_fetch_array($resultM);

      while($row = mysqli_fetch_array($result))
        {
          $output .='<tr><td>'.$row["iddemande"].'</td><td>'.queryType2($row["idtype"]).'</td><td>'.$rowS["Nom"].' '.$rowS["Prenom"].'</td><td>'.$rowM["Nom"].' '.$rowM["Prenom"].'</td><td>'.$row["Date_deb"].'</td><td>'.$row["Date_envoie"].'</td><td>'.$row["NbEngage"].'</td><td><input value = Modifier type=button name=Mod'.$row["iddemande"].' onclick="Modify('.$row["iddemande"].')"></input><button onclick = "Delete('.$row["iddemande"].');">Supprimer</button></td><td><div id=div'.$row["iddemande"].'><div></td></tr>';
        }

      $data = array(
         'demande' => $output,
      );
     // echo var_dump($data);
      echo json_encode($data);
   }
?>