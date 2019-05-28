<html>
<head>   

</head>
<body>

	<?php

		include '../Control/sentMail.php';
		$sentMail = new sentMail('remymercier1@free.fr','Autre Test', 'ça doit marcher');
		$sentMail->sendMail();

	?>
	
</body>
</html> 