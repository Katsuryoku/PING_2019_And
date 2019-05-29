<?php
//include('accessBDD.php');
if(isset($_POST['view'])){
$con = mysqli_connect("localhost", "root", "", "andrice");
if($_POST["view"] != '')
{
   $update_query = "UPDATE typedemande SET status = 1 WHERE status=0";
   mysqli_query($con, $update_query); 
}
$query = "SELECT * FROM typedemande ORDER BY idtype DESC LIMIT 5";
$result = mysqli_query($con, $query);
$output = '';
$querycount = "SELECT COUNT(*) FROM typedemande ORDER BY idtype DESC LIMIT 5";
$countr = mysqli_query($con, $query);
if(mysqli_num_rows($result)>0)
{
while($row = mysqli_fetch_array($result))
{
  $output .= '
  <li>
  <a href="#">
  <strong>'.$row["idtype"].' : '.$row["Nom"].'</strong><br />
  <small><em>'.$row["Descriptif"].'</em></small>
  </a>
  </li>
  ';
}
}
else{
    $output .= '<li><a href="#" class="text-bold text-italic">No Noti Found</a></li>';
}
$status_query = "SELECT * FROM typedemande WHERE status=0";
$result_query = mysqli_query($con, $status_query);
$count = mysqli_num_rows($result_query);
$data = array(
   'notification' => $output,
   'unseen_notification'  => $count
);
echo json_encode($data);
}
?>