$(document).ready(function() {
	console.log('begin');
			var id = "64" // A CHANGER AVEC LE LOGIN
			$.ajax({
				url:"../../Model/fetchSalarie.php",
				type : 'get',
				data : {'id' : id},
				dataType:'json',
				success:function(data)
				{
			    	//console.log(data);
			    	var event_data = data.demande;
			    	$("#Demandes").append(event_data);
			    },
			    error: function(d)
			    {
			    	console.log("error");
			    	alert("404. Please wait until the File is Loaded.");
			    }
			})
		});

function Modify(id){
	//MAIL

	$("#picker").daterangepicker({
		timePicker: true,
		startDate: moment().startOf('hour'),
		endDate: moment().startOf('hour').add(32, 'hour'),
		locale: {
			format: ' DD/M A',
			daysOfWeek: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
			monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
		}
	});
	
	var Dates = "2019-06-25";
	var NbJours = 30;
	$.ajax({
		url: "../../Model/editDemande.php",
		type : "POST",
		data : {"id" : id, "Date" : Dates, "NbJours" : NbJours} ,
		dataType:'json',
		success:function(data)
		{
			console.log(data);
			console.log("Accepted");
		},
		error: function(error)
		{
			console.log(error);
		}
	});
}

function Delete(id){
	
	$.ajax({
		url: "../../Model/editDemande.php",
		type : "POST",
		data : {"id" : id} ,
		dataType:'json',
		success:function(data)
		{
			console.log(data);
			console.log("Accepted");
		},
		error: function(error)
		{
			console.log(error);
		}
	});
}
;
