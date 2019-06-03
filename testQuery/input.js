$(document).ready(function() {
			console.log('begin');

		    $.ajax({
			    url:"fetch.php",
			    type : 'get',
			    dataType:'json',
			    success:function(data)
			    {
			    	console.log(data);
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