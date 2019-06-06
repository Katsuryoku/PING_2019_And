$(function(){
	var includes = $('[data-include]');
	jQuery.each(includes, function(){
		var file = $(this).data('include') + '.php';
		$(this).load(file);
	});
});
$(document).ready(function(){

	$('.navbar-nav > li > a[href="'+pathname+'"]').parent().addClass('active');
	$('.navbar-nav > li > a[href="'+pathname+'"]').append("<span class=\"sr-only\">(current)</span>");

	// get current URL path and assign 'active' class
	var pathname = window.location.pathname;
	pathname = pathname.substr(20);
	console.log(pathname);
	var viewed = false;
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
	$.ajax({
		url:"../../Control/fetchControlEmployee.php",
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