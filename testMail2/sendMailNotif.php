<?php 

	function sendMailNotif($id,$TypeMail){
		/*
		Types de mails : 
		MR: Refus du manager
		MA : Accepté par le manager
		RA : Accepté par le RH
		RR : Refusé par le RH 
		EM : Modifié par l'employé
		ES : Supprimé par l'employé
		EE : Demande envoyée
		*/
		include "query.php";
		include "../sentMail.php";
		if ($TypeMail == "MR"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé refusée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été refusée par votre manager pour cette raison : ".$Motif;
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Confirmation de décision";
			$BodyM = "La demande numéro ".$id." a bien été refusée."
			sendMail($SubjectM,$mailM,$BodyM);
		}
		if ($TypeMail == "MA"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé pré-acceptée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été acceptée par votre manager.";
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Confirmation de décision";
			$BodyM = "La demande numéro ".$id." a bien été acceptée."
			sendMail($SubjectM,$mailM,$BodyM);

			$SubjectR = "Demande de congé reçu";
			$BodyR = "Vous avez reçu une demande de ".$type;
			sendMail($SubjectR,$mailR,$BodyR);
			
		}
		if ($TypeMail == "RA"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé acceptée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été acceptée.";
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Demande de congé acceptée par le RH";
			$BodyM = "La demande numéro ".$id." a été acceptée."
			sendMail($SubjectM,$mailM,$BodyM);

			$SubjectR = "Confirmation de décision";
			$BodyR = "La demande numéro ".$id." a bien été acceptée."
			sendMail($SubjectR,$mailR,$BodyR);
			
		}
		if ($TypeMail == "RR"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "OUI";
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Demande de congé refusée";
			$BodyE = "Votre demande de ".$type." du ".$date." a été refusée par votre RH pour cette raison : ".$Motif;
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Demande de congé refusée par le RH";
			$BodyM = "La demande numéro ".$id." a été refusée."
			sendMail($SubjectM,$mailM,$BodyM);

			$SubjectR = "Confirmation de décision";
			$BodyR = "La demande numéro ".$id." a bien été refusée."
			sendMail($SubjectR,$mailR,$BodyR);
			
		}
		if ($TypeMail == "EM"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "OUI";
			$date = queryDate($id);
			$type = queryType($id);
			$RH = queryRH($id);

			$SubjectE = "Confirmation de modification";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été modifiée.";
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Demande de congé modifiée";
			$BodyM = "La demande numéro ".$id." a bien été modifiée.";
			sendMail($SubjectM,$mailM,$BodyM);

			if ($RH == 1)
				{$SubjectR = "Demande de congé modifiée";
				$BodyR = "La demande numéro ".$id." a bien été modifiée.";
				sendMail($SubjectR,$mailR,$BodyR);
				}
			
		}
		if ($TypeMail == "ES"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "OUI";
			$date = queryDate($id);
			$type = queryType($id);
			$RH = queryRH($id);

			$SubjectE = "Confirmation de supression";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été supprimée.";
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Demande de congé supprimée";
			$BodyM = "La demande numéro ".$id." a été supprimée.";
			sendMail($SubjectM,$mailM,$BodyM);

			if ($RH == 1)
				{$SubjectR = "Demande de congé supprimée";
				$BodyR = "La demande numéro ".$id." a été supprimée.";
				sendMail($SubjectR,$mailR,$BodyR);
				}
			
		}
		if ($TypeMail == "EE"){
			$mailE = queryMails($id, "Employe");
			$mailM = queryMails($id, "Manager");
			$mailR = "OUI";
			$date = queryDate($id);
			$type = queryType($id);

			$SubjectE = "Confirmation d'envoie";
			$BodyE = "Votre demande de ".$type." du ".$date." a été bien été envoyée.";
			sendMail($SubjectE,$mailE,$BodyE);

			$SubjectM = "Demande de congé reçu";
			$BodyM = "Vous avez reçu une demande de ".$type;
			sendMail($SubjectM,$mailM,$BodyM);
			
		}
	}

 ?>