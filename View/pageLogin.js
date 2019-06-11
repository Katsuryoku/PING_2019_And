function EnvoiePost(loginS,mdp){
	$.ajax({
		url:"session.php",
		type:"POST",
		data:{"login":loginS,"password":mdp},
		success: function () {   // success callback function

			
    }
		
		
	});
	if(loginS==="JBR"){
		document.location.href='Salarie/pageSalarieCadre.php';	
	}
	if(loginS==="SF"){
		document.location.href='Salarie/pageSalarieNonCadre.php';
	}
	if(loginS==="MANA"){
		document.location.href='Manager/pageManager.php';
	}
	if(loginS==="DDI"){
		document.location.href='RH/pageRH.php';
	}
}