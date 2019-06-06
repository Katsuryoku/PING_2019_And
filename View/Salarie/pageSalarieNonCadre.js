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

function calendarFunction() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}
$(document).ready(function(){
	$("#picker").daterangepicker({
		beforeShowDay: function(date)
		{	
			var day = date.getDay();
			if (day==0 || day==6)
			{	
				return [false];
			}
			else 
				return [true];
		}});
});


