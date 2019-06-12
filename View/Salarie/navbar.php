<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#">GESTION DES CONGES</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <li class="nav-item">
      <a class="nav-item nav-link " href="../pageLogin.php">HOME</a>
      </li>
      
      <li class="nav-item"><?php
if(isset($_SESSION)) {
  $log= $_SESSION["login"];
}else{
  session_start();
  $log= $_SESSION["login"];
}
if ($log == 'JBR'){
  ?>
      <a class="nav-item nav-link " href="pageSalarieCadre.php">DashBoard</a>
  <?php
}else{
  ?>
      <a class="nav-item nav-link " href="pageSalarieNonCadre.php">DashBoard</a>
  <?php
}
?>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link" href="demandes.php">Demandes en cours</a>
      </li>
      <li class="nav-item">
      <a class="nav-item nav-link" href="historique.php">Historique</a>
      </li>
      <li class="nav-item dropdown navbar-right">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="label label-pill label-danger count" style="border-radius:10px;"></span>
          <span class="far fa-bell" style="font-size:18px;"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        </div>
      </li>
    </div>
  </div>
</nav>
<div class="dodo" style="height:50px;"></div>
	