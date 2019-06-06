// Fonction qui permet de récupérer les notifications
// @input : view : permet de savoir si on a cliqué sur la notification ou non. ('' pas cliqué)
export function load_unseen_notification(view = '')
{
 $.ajax({
  url:"../Model/fetch.php",
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