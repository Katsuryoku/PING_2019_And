<!DOCTYPE html>

<html>

<head>

 <title>Notification using PHP Ajax Bootstrap</title>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

 <br /><br />

 <div class="container">

  <nav class="navbar navbar-inverse">

   <div class="container-fluid">

    <div class="navbar-header">

     <a class="navbar-brand" href="#">PHP Notification Tutorial</a>

    </div>

    <ul class="nav navbar-nav navbar-right">

     <li class="dropdown">

      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>

      <ul class="dropdown-menu"></ul>

     </li>

    </ul>

   </div>

  </nav>

  <br />

  <form method="post" id="type_form">

   <div class="form-group">

    <label>Enter id</label>

    <input type="text" name="id" id="id" class="form-control">

   </div>
<div class="form-group">

    <label>Enter Name</label>

    <input type="text" name="name" id="name" class="form-control">

   </div>
   <div class="form-group">

    <label>Enter Description</label>

    <textarea name="desc" id="desc" class="form-control" rows="5"></textarea>

   </div>

   <div class="form-group">

    <input type="submit" name="post" id="post" class="btn btn-info" value="Post" />

   </div>

  </form>


 </div>

</body>

</html>
<script>
$(document).ready(function(){
// updating the view with notifications using ajax
function load_unseen_notification(view = '')
{
 $.ajax({
  url:"../Control/fetchControl.php",
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
// submit form and get new records
$('#type_form').on('submit', function(event){
 event.preventDefault();
 if($('#id').val() != '' && $('#name').val() != '' && $('#desc').val() != '')
 {
  var form_data = $(this).serialize();
  $.ajax({
   url:"../Model/insertType.php",
   method:"POST",
   data:form_data,
   success:function(data)
   {
    $('#type_form')[0].reset();
    load_unseen_notification();
   }
  });
 }
 else
 {
  alert("Both Fields are Required");
 }
});
// load new notifications
$(document).on('click', '.dropdown-toggle', function(){
 $('.count').html('');
 load_unseen_notification('yes');
 console.log("yes");
});
setInterval(function(){
 load_unseen_notification();;
}, 5000);
});
</script>