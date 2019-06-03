<?php
include('access.php');
/* Fonction qui fetch la base de donnée
* @InPut : $bdd = base de donnée voulu
*          $checkatt : attribut permettant à checker la valeur
*          $idorder : attribut permettant d'ordonner les notifications
*          $con : la connexion à la base de donnée
*/
function fetch($post_view,$bdd, $checkatt, $idorder, $con){
  if(isset($post_view)){
    if($post_view != '')
    {
     $update_query = "UPDATE ".$bdd." SET ".$checkatt." = 1 WHERE ".$checkatt."=0";
     mysqli_query($con, $update_query); 
   }
   $query = "SELECT * FROM ".$bdd." ORDER BY ".$idorder." DESC LIMIT 5";
   $result = mysqli_query($con, $query);
   $output = '';
   if(mysqli_num_rows($result)>0)
   {
    while($row = mysqli_fetch_array($result))
    {
      $output .= '
      <li>
      <a href="#">
      <strong>'.$row["iddemande"].' : '.$row["idsalaries"].'</strong><br />
      <small><em>'.$row["Date_deb"].'</em></small>
      </a>
      </li>
      ';
    }
  }
  else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
  }
  $status_query = "SELECT * FROM ".$bdd." WHERE ".$checkatt."=0";
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