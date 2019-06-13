<?php
include("connect.php");
 include ("sendMailNotif.php");
 function ModifDemande($con,$id,$startDate,$endDate,$demiDeb,$demiFin, $login, $idtype){

            
            $deb = $startDate;
            $end = $endDate;

            $Date_deb = strtotime($deb);
            $Date_end = strtotime($end);
            $deb= new DateTime($deb);
            $deb = $deb->format("Y-m-d");

            $NbEngage = dateDiff($Date_end,$Date_deb);
            $NbEngage = (float)$NbEngage["day"];

            if($demiDeb=="true" && $demiFin=="true"){
                $demiJournee = true;
                $NbEngage=$NbEngage-1;
            }
            elseif($demiDeb!="true" && $demiFin=="true"){
                $demiJournee = false;
                $NbEngage=$NbEngage-0.5;
            }
            elseif($demiDeb=="true" && $demiFin!="true"){
                $demiJournee = true;
                $NbEngage=$NbEngage-0.5;
            }
            elseif($demiDeb!="true" && $demiFin!="true"){
                $demiJournee = false;
            }
            if($demiJournee){
                $demiJournee=1;
            }else{
                $demiJournee=0;
            }
            
            $query = 'UPDATE demande SET Date_deb = "'.$deb.'", NbEngage ="'.$NbEngage.'",demiJournee ='.$demiJournee.',Prevalide =0,Valide=0,viewByManager = 0, viewByRH = 0  WHERE iddemande = '.$id;
            var_dump($query);
            mysqli_query($con, $query);
            sendMailNote($id,"EM");



        }   
 function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();

    $tmp = $diff;
    $retour['second'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;

    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;

    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp+1;

    return $retour;
}
?>

