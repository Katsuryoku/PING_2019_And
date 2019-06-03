<?php
include('access.php');
/* Fonction qui fetch la base de donnée
* @InPut : $bdd = base de donnée voulu
*          $checkatt : attribut permettant à checker la valeur
*          $idorder : attribut permettant d'ordonner les notifications
*          $con : la connexion à la base de donnée
*          $idmana : id du manager si c'est un accès manager
*/
function fetch($post_view,$bdd, $checkatt, $idorder, $con, $idmana = '',$idUser = ''){
  if(isset($post_view)){
    if($post_view != '')
    {
      if ($idUser != ''){
       $update_query = "UPDATE ".$bdd." SET ".$checkatt." = 1 WHERE ".$checkatt."=0 AND Valide =1 AND idsalaries = ".$idUser;

     }else{
      // Cas RH
      if ($idmana == ''){
       $update_query = "UPDATE ".$bdd." SET ".$checkatt." = 1 WHERE ".$checkatt."=0 AND Valide =0";
     }else{
        // Cas Manager
       $update_query = "UPDATE ".$bdd." SET ".$checkatt." = 1 WHERE ".$checkatt."=0 AND Prevalide =0 AND idRespHier = ".$idmana;
     }
   }
   mysqli_query($con, $update_query); 
 }
 if ($idUser != ''){
  $query =  "SELECT * FROM ".$bdd." WHERE Valide =1 AND ".$checkatt."=0 AND idsalaries = ".$idUser." ORDER BY ".$idorder." DESC LIMIT 5" ;

 }else{
   // Cas RH
   if ($idmana == ''){
    $query = "SELECT * FROM ".$bdd." WHERE Valide =0 AND ".$checkatt."=0 ORDER BY ".$idorder." DESC LIMIT 5";
  }else{
    // cas Manager
    $query = "SELECT * FROM ".$bdd." WHERE  ".$checkatt."=0 AND idRespHier = ".$idmana." AND Prevalide =0 ORDER BY ".$idorder." DESC LIMIT 5";
  }
}
$result = mysqli_query($con, $query);
$output = '';
if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_array($result))
  {
    if ($idUser != ''){
      $output .= '
      <li>
      <a href="../View/pageRH.html">
      <strong> La demande du '.$row["Date_deb"].' a été validée !</strong><br />
      </a>
      </li>
      ';
    }else{
      if ($idmana == ''){
        $output .= '
        <li>
        <a href="../View/pageRH.html">
        <strong>'.$row["iddemande"].' : '.$row["idsalaries"].'</strong><br />
        <small><em>'.$row["Date_deb"].'</em></small>
        </a>
        </li>
        ';
      }else{
        $output .= '
        <li>
        <a href="../View/pageManager.html">
        <strong>'.$row["iddemande"].' : '.$row["idsalaries"].'</strong><br />
        <small><em>'.$row["Date_deb"].'</em></small>
        </a>
        </li>
        ';

      }
    }
  }
}
else{
  $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
if ($idUser != ''){
 $status_query =  "SELECT * FROM ".$bdd." WHERE  ".$checkatt."=0 AND Valide =1 AND idsalaries = ".$idUser." ORDER BY ".$idorder." DESC LIMIT 5" ;

}else{
  if ($idmana == ''){

    $status_query = "SELECT * FROM ".$bdd." WHERE ".$checkatt."=0 AND Valide =0";
  }else{
    $status_query = "SELECT * FROM ".$bdd." WHERE ".$checkatt."=0 AND Prevalide =0 AND idRespHier = ".$idmana;
  }
}
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
 'notification' => $output,
 'unseen_notification'  => $count
);
echo json_encode($data);
}
};
?>