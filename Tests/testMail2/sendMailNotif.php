<?php 
	include "connect.php";
	include "query.php";
	include "C:/wamp64/www/PING_2019_And-Mercier/Tests/testMail/sendMail.php";
	
	function sendMailNote($id,$TypeMail){
	
		// Types de mails : 
		// MR: Refus du manager
		// MA : Accepté par le manager
		// RA : Accepté par le RH
		// RR : Refusé par le RH 
		// EM : Modifié par l'employé
		// ES : Supprimé par l'employé
		// EE : Demande envoyée
		//error_reporting(2);

		if ($TypeMail == "MR"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$date = queryDate($id);
			$type = queryType($id);
			$Motif = queryMotif($id);

			$SubjectE = "Demande de congé refusée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été refusée par votre manager pour cette raison : ".$Motif;
			// $BodyE = "La demande numéro 1 a bien été refusée.";
			
			$SubjectM = "Confirmation de décision";
			$BodyM = "La demande numéro 1 a bien été refusée.";	
			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail1->sendMail();					
			$mail2->sendMail();	
		}

		elseif ($TypeMail == "MA"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé pré-acceptée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été acceptée par votre manager.";
			

			$SubjectM = "Confirmation de décision";
			$BodyM = "La demande numéro ".$id." a bien été acceptée.";
			

			$SubjectR = "Demande de congé reçu";
			$BodyR = "Vous avez reçu une demande de ".$type;
			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail3 = new Mail($SubjectR,$mailR,$BodyR);
			$mail1->sendMail();					
			$mail2->sendMail();
			$mail3->sendMail();
			
		}
		elseif ($TypeMail == "RA"){
			var_dump($id);
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé acceptée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été acceptée.";
			
			$SubjectM = "Demande de congé acceptée par le RH";
			$BodyM = "La demande numéro ".$id." a été acceptée.";
			
			$SubjectR = "Confirmation de décision";
			$BodyR = "La demande numéro ".$id." a bien été acceptée.";

			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail3 = new Mail($SubjectR,$mailR,$BodyR);
			$mail1->sendMail();					
			$mail2->sendMail();
			$mail3->sendMail();
			
		}
		elseif ($TypeMail == "RR"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);
			$Motif = queryMotif($id);

			$SubjectE = "Demande de congé refusée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été refusée par votre RH pour cette raison : ".$Motif;
			
			$SubjectM = "Demande de congé refusée par le RH";
			$BodyM = "La demande numéro ".$id." a été refusée.";
			
			$SubjectR = "Confirmation de décision";
			$BodyR = "La demande numéro ".$id." a bien été refusée.";
			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail3 = new Mail($mailR,$SubjectR,$BodyR);
			$mail1->sendMail();					
			$mail2->sendMail();
			$mail3->sendMail();
			
		}
		elseif ($TypeMail == "EM"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);
			$RH = queryRH($id);

			$SubjectE = "Confirmation de modification";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été modifiée.";
			
			$SubjectM = "Demande de congé modifiée";
			$BodyM = "La demande numéro ".$id." a bien été modifiée.";

			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail1->sendMail();					
			$mail2->sendMail();	

			if ($RH == 1)
				{
					$SubjectR = "Demande de congé modifiée";
				$BodyR = "La demande numéro ".$id." a bien été modifiée.";

				$mail3 = new Mail($mailR,$SubjectR,$BodyR);
				$mail3->sendMail();
				}
			
		}
		elseif ($TypeMail == "ES"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);
			$RH = queryRH($id);

			$SubjectE = "Confirmation de supression";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été supprimée.";
			
			$SubjectM = "Demande de congé supprimée";
			$BodyM = "La demande numéro ".$id." a été supprimée.";

			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail1->sendMail();					
			$mail2->sendMail();	

			if ($RH == 1)
				{
				$SubjectR = "Demande de congé supprimée";
				$BodyR = "La demande numéro ".$id." a été supprimée.";

				$mail3 = new Mail($mailR,$SubjectR,$BodyR);
				$mail3->sendMail();
				}
			
		}
		elseif ($TypeMail == "EE"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "remymercier1@free.fr";
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Confirmation d'envoie";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été envoyée.";
			
			$SubjectM = "Demande de congé reçu";
			$BodyM = "Vous avez reçu une demande de ".$type;

			$mail1 = new Mail($mailE,$SubjectE,$BodyE);
			$mail2 = new Mail($mailM,$SubjectM,$BodyM);
			$mail1->sendMail();					
			$mail2->sendMail();
			}
		}
		
	

	//sendMailNote(1,"ES");
?>