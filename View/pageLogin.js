function EnvoiePost(loginS,mdp){
	$.ajax({
		url:"session.php",
		type:"POST",
		data:{"login":loginS,"password":mdp},
		success: function () {   // success callback function

			
    }
		
		
	});
	if(loginS==="JBR"){
		document.location.href='http://localhost/projet%20ingenierie/PING_2019_And/View/Salarie/pageSalarieCadre.php';	
	}
	if(loginS==="SF"){
		document.location.href='http://localhost/projet%20ingenierie/PING_2019_And/View/Salarie/pageSalarieNonCadre.php';
	}
	
	
}