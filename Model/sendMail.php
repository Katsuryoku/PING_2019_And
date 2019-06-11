<?php
	date_default_timezone_set('Etc/UTC');
	use PHPMailer\PHPMailer\PHPMailer;
	require 'vendor/autoload.php';
	class Mail {  
     
  		/*private $Subject = 'test';
  		private $toAddress = 'remymercier1@free.fr';
  		private $Body = 'test';*/

	    public function __construct($to,$Sub,$Body){     
	        $this->naviHref = htmlentities($_SERVER['PHP_SELF']);
	        $this->Subject = $Sub;
	        $this->toAddress = $to;
	        $this->Body = $Body;
	    }
		public function sendMail(){
			$mail = new PHPMailer;

			//$mail->SMTPDebug = 2;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPAuth = true;
			$mail->Username = "tseping19@gmail.com";
			$mail->Password = "rattjMMMNR";
			$mail->SMTPSecure = 'tls'; 
			
			$mail->SMTPOptions = array(
	    	'ssl' => array(
	        'verify_peer' => false,
	        'verify_peer_name' => false,
	        'allow_self_signed' => true
			    )
			);

			$mail->setFrom('tseping19@gmail.com');
			$mail->addAddress($this->toAddress);			
			$mail->isHTML(true);
			$mail->Subject = $this->Subject;		 
		    $mail->Body    = $this->Body;

			if (!$mail->send()) {
			    echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			}
		}
	}
		
