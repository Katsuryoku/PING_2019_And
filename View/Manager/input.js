$(document).ready(function() {

		    $.ajax({
			    url:"../../Model/fetchManager.php",
			    type : 'get',
			    dataType:'json',
			    success:function(data)
			    {
			    	//console.log(data);
			      	var event_data = data.demande;
		            $("#Demandes").append(event_data);
			    },
				error: function(data)
				{
					// var event_data = data.demande;
		   //          $("#Demandes").append(event_data);
            		console.log("error");
            		alert("404. Please wait until the File is Loaded.");
        		}
		     })
		    });

function Accept(id){
	$.ajax({
			    url: "../../Model/insertManager.php",
			    type : "POST",
			    data : {"id" : id} ,
			    dataType:'json',
			    success:function(data)
			    {
			    	//console.log(data);
			    	console.log("Accepted");
			    },
				error: function(error)
				{
            		console.log(error);
        		}
		     });
}

function Refuse(id){
	openPopUpWindow(id);
	}

function openPopUpWindow(targetField){
        var w = window.open('Motif.html','_blank','width=400,height=400,scrollbars=1');
        // pass the targetField to the pop up window
        w.targetField = targetField;
        w.focus();
    }
;
