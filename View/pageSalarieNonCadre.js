

function showPopUp(){
	let value = document.getElementById("motifAbsence").value;
	let ch = "#popup";
	ch+=value;

	endToast();
	endDeces();
	endMariage();
	let popup = document.getElementById("popup"+ value);
	popup.style.display="block";
	$(document).ready(function(){
		$(ch).toast('show');
	});


		
}
function endToast(){
	let elements = document.getElementsByClassName("toast");
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display="none";
	}
	
}

function endDeces(){
	let typeDeces = document.getElementById("deces");
		typeDeces.style.display="none";
}

function endMariage(){
	let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="none";
}

function infoDeces(){
	let value = document.getElementById("casDeces").value;
	if(value==="1"){
		endToast();
		let popup = document.getElementById("popupsDeces1");
		popup.style.display="block";
		$(document).ready(function(){
		$("#popupsDeces1").toast('show');
	});
	}
	else{
			endToast();
		let popup = document.getElementById("popupsDeces2");
		popup.style.display="block";
		$(document).ready(function(){
		$("#popupsDeces2").toast('show');
	});

	}
	
}

function infoMariage(){
	let value = document.getElementById("casMariage").value;
	if(value==="1"){
		endToast();
		let popup = document.getElementById("popupsMariage1");
		popup.style.display="block";
		$(document).ready(function(){
		$("#popupsMariage1").toast('show');
	});
	}
	else{
			endToast();
		let popup = document.getElementById("popupsMariage2");
		popup.style.display="block";
		$(document).ready(function(){
		$("#popupsMariage2").toast('show');
	});

	}
	
}

function clickMotifAbsence(){
	let value = document.getElementById("motifAbsence").value;
	
	if(value==='1'){
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="block";
		
	}
	else if(value==='2'){
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="block";
	}
	else{
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="none";	
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="none";
	}
	
}



function ajouteOption(){

	var requete = new XMLHttpRequest();
requete.onload = function() {
 //La variable à passer est alors contenue dans l'objet response et l'attribut responseText.
 var variableARecuperee = this.responseText;
};
requete.open(get, pageSalarieNonCadre.php, true); //True pour que l'exécution du script continue pendant le chargement, false pour attendre.
requete.send();

		
	 var genre = document.getElementById(variableAPasser).value;

	console.log("ajouteOption");
	if(genre==="Homme"){
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé paternité","5");
	}
	else{
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé maternité","6");
	}
}



