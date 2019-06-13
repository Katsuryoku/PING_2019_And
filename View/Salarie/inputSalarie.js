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
		// console.log('div'+id);
		var it = document.getElementById('div'+ id);
		// console.log(it);
		it.innerHTML = '<input type = button name= '+id+' id="push"></input>';
		$('#push').daterangepicker({
			timePicker: false,
			startDate: moment().startOf('day'),
			endDate: moment().startOf('day').add(1, 'day'),
			locale: {
				format: ' DD/MM',
				daysOfWeek: ['Di','Lu','Ma','Me','Je','Ve','Sa'],
				monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
			}
		});

	}

function sendModif() {
	var it = document.getElementById('push');
	console.log("sendModif");
	var start = $(it).data("daterangepicker").startDate.format('YYYY-MM-DD HH:mm:ss');
	var end = $(it).data('daterangepicker').endDate.format('YYYY-MM-DD HH:mm:ss');
	demiDeb = document.getElementById("demiJourneeStart").checked;
	demiFin = document.getElementById("demiJourneeEnd").checked;
	ModifyValue(start,end,demiDeb,demiFin);
};

function ModifyValue(start,end,demiDeb,demiFin){
	var it = document.getElementById('push');
	var id = it.name;
	console.log(id);
	it.innerHTML = '';
	$.ajax({
		url: "../../Control/controlModif.php",
		type : "POST",
		data : {id : id, start : start, end : end,demiDeb : demiDeb,demiFin : demiFin} ,
		dataType:'json',
		success:function(data)
		{
			console.log(data);
			console.log("Accepted");
		},
		error: function(error)
		{
			console.log("fail");
		}
	});
	// document.location.reload();
}

function Delete(id){
	
	$.ajax({
		url: "../../Model/eraseDemande.php",
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
