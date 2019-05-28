

function showPopUp(){

	for (i=0; i<document.forms.f.motifAbsence.options.length; i++) { 
		if (document.forms.f.motifAbsence.options[i].selected ) { 
			if(i===1) showPopUp1();
			if(i===2) showPopUp2();
			if(i===3) showPopUp3();
			if(i===4) showPopUp4();
			let typeDeces = document.getElementById("deces");
			typeDeces.style.display="none";
  		} 
	} 
		
}

function showPopUp1(){
	let elements = document.getElementsByClassName("popups");
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display="none";
	}

	let popup = document.getElementById("popup1");
	popup.style.display = "block";

}
function showPopUp2(){
	let elements = document.getElementsByClassName("popups");
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display="none";
	}
	let popup = document.getElementById("popup2")
	popup.style.display = "block";
}
function showPopUp3(){
	let elements = document.getElementsByClassName("popups");
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display="none";
	}
	let popup = document.getElementById("popup3")
	popup.style.display = "block";
}
function showPopUp4(){
	let elements = document.getElementsByClassName("popups");
	for (var i = 0; i < elements.length; i++) {
		elements[i].style.display="none";
	}
	let popup = document.getElementById("popup4")
	popup.style.display = "block";

}


function clickDeces(){
	console.log("ge");
	let typeDeces = document.getElementById("deces");
	typeDeces.style.display="block";
}