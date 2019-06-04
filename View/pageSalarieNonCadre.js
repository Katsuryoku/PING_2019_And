$(function(){
    var includes = $('[data-include]');
    jQuery.each(includes, function(){
      var file = $(this).data('include') + '.php';
      $(this).load(file);
    });
  });

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
	console.log("fe");
	if(value==='1'){
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="block";
		
	}
	if(value==='2'){
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="block";
	}
	else{
		let typeDeces = document.getElementById("deces");
		typeDeces.style.display="none";	
		let typeMariage = document.getElementById("mariage");
		typeMariage.style.display="block";
	}
	
}

f

function ajouteOption(genre){
	console.log("ajouteOption");
	if(genre==="h"){
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé paternité","5");
	}
	else{
		var select = document.getElementById("motifAbsence");
		select.options[select.options.length] = new Option("Congé maternité","6");
	}
}

$(document).ready(function(){
	// get current URL path and assign 'active' class
	var pathname = window.location.pathname;
	pathname = pathname.substr(20);
	console.log(pathname);
	$('.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
	$('.navbar-nav > li > a[href="'+pathname+'"]').append("<span class=\"sr-only\">(current)</span>");
var viewed = false;
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
	$.ajax({
		url:"../Control/fetchControlEmployee.php",
		method:"POST",
		data:{view:view},
		dataType:"json",
		success:function(data)
		{
			console.log("unsee :");
			console.log(data.unseen_notification);
			console.log("notif :");
			console.log(data.notification);
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0)
			{
				$('.count').html(data.unseen_notification);
			}
		}
	});
}
load_unseen_notification();
$(document).on('click', '.navbar', function(){
	if (viewed == true){
	$('.count').html('');
	load_unseen_notification('yes');
	viewed = false;
	}
});
$(document).on('click','body *', function(){
	if (viewed == true){
	$('.count').html('');
	load_unseen_notification('yes');
	viewed = false;
	}
})
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
	console.log(viewed);
	$('.count').html('');
	if (viewed == true){
		load_unseen_notification('yes');
		viewed = false;
	}else{
		viewed = true;
	};
});
setInterval(function(){
	load_unseen_notification();;
}, 5000);
});

