$(function(){
	var includes = $('[data-include]');
	jQuery.each(includes, function(){
		var file = $(this).data('include') + '.php';
		$(this).load(file);
	});
});

function showPopUp(){
	let value = document.getElementById("motifAbsence").value;
	GetDescriptif('3'+value);
	endToast();
	endDeces();
	endMariage();
	let popup = document.getElementById("popup");
	popup.style.display="block";
	$(document).ready(function(){
		$("#popup").toast('show');
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

function infoDecesMariage(){
	let value = document.getElementById("casDeces").value;
	let idtype="40"+value;
	GetDescriptif2(idtype);
	endToast();
	let popup = document.getElementById("popupsDeces");
	popup.style.display="block";
	$(document).ready(function(){
		$("#popupsDeces").toast('show');
	});
	
}



function clickMotifAbsence(id,date,demi,nb){
	let value = document.getElementById("motifAbsence").value;
	
	if(value==='01'){
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="block";
		
	}
	else if(value==='02'){
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="block";
	}

	
	else if(value==='03' || value==='04' || value==='07'){
		let typeAbs = document.getElementById('Abs');
		typeAbs.style.display=calendarFunctionAbs();
	}
	else {
		sendType("3"+value);
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="none";	
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="none";
		let typeAbs = document.getElementById("Abs");
		typeAbs.style.display="none";
	}
	
	
}
function Confirm(){
	openPopUpWindow();
}

function openPopUpWindow(){
        var w = window.open('Confirmation.html','_blank','width=400,height=400,scrollbars=1');
        w.focus();
    }
;
function send() {
	var start = $('#picker').data('daterangepicker').startDate.format('YYYY-MM-DD HH:mm:ss');
	var end = $('#picker').data('daterangepicker').endDate.format('YYYY-MM-DD HH:mm:ss');
	demiDeb = document.getElementById("demiJourneeStart").checked;
    demiFin = document.getElementById("demiJourneeEnd").checked;
    sendDate(start,end,demiDeb,demiFin);
    
    //console.log(demiDeb);
   };


function sendDate(startDate,endDate,demiDeb,demiFin){

	$.ajax({
		    url: "../../Model/createDemande.php",
		    type : "POST",
		    data : {"startDate" : startDate, "endDate" : endDate,"demiDeb":demiDeb,"demiFin":demiFin} ,
		    dataType:'json',
		    success: function(data){
			    	console.log(data);
			    	console.log("success");
			    }
	     })
}


function sendType(type)
	{
		$.ajax({
			    url: "../../Model/createDemande.php",
			    type : "POST",
			    data : {"type" : type} ,
			    dataType:'json',
			    success: function(){
			    	console.log("success");
			    }
		     });
	}


function GetDescriptif(ty){

	$.ajax({
		url:"TraitementTypeAbsence.php",
		type:"get",
		data: 'type=' + ty,
		dataType: 'text',
		success: function(descriptif) {  

			document.getElementById('descr1').innerHTML=descriptif;

		}
	});
}

function GetDescriptif2(ty){

	$.ajax({
		url:"TraitementTypeAbsence.php",
		type:"get",
		data: 'type=' + ty,
		dataType: 'text',
		success: function(descriptif) {  

			document.getElementById('descr2').innerHTML=descriptif;

		}
	});
}
function calendarFunction() {
	var x = document.getElementById("myDIV");
	//var y = document.getElementById("myDIVBis");
	if (x.style.display === "none") {
		x.style.display = "block";
		//y.style.display = "none";
	} else {
		x.style.display = "none";
	}
}

function calendarFunctionBis() {
	var x = document.getElementById("myDIVBis");
	//var y = document.getElementById("myDIV");
	if (x.style.display === "none") {
		x.style.display = "block";
		//y.style.display = "none";
	} else {
		x.style.display = "none";
	}
}

function calendarFunctionTer() {
	var x = document.getElementById("myDIVTer");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}



function calendarFunctionMariage() {
	let value = document.getElementById("casMariage").value;
	if (value===1) sendType("403");
	else sendType('404');
	var x = document.getElementById("myDIVMariage");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}

function calendarFunctionDeces() {
	let value = document.getElementById("casDeces").value;
	sendType("40"+value);
	var x = document.getElementById("myDIVDeces");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}

function calendarFunctionAbs() {
	var x = document.getElementById("myDIVAbs");
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}
