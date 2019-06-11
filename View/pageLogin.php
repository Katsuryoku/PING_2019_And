<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="pageLogin.css" />
	<title> Login Andrice Congés</title>
	<script type="text/javascript" src="pageLogin.js"></script>
</head>
<body>
	
	<div>
		<h1> Page de connexion</h1>
		<p>

			<a><button id="button1" onclick="EnvoiePost('JBR','9b79621498a545fdb1a522f149e62bde0de466e93574db19972e38570495c91b')">Je suis un salarié cadre</button></a>
			<a><button id="button2" onclick="EnvoiePost('SF','SECRET')">Je suis un salarié non cadre</button></a>
			<a><button id="button3" onclick="EnvoiePost('MANA','848c5677d5f2041be051e1f6f3adeccb20b23d6e318c8d73a7abe723f4e9cfc6')" >Je suis un manager</button></a>
			<a><button id="button4" onclick="EnvoiePost('RRH','2365656fe8873c0f5da14aa496deb33112729378e51ee3c580321dbe5b8b75b9')" >Je suis un RH </button></a>
	
		</p>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>
</html>