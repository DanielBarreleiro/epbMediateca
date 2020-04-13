<?php

if(isset($_SESSION['login']))
{
  $sid = $_SESSION['stdid'];
?>
<nav class="uk-navbar-container" uk-navbar>
  <div class="uk-navbar-left">
    <a class="uk-navbar-item uk-logo" href="../index.php"><img src="img/logo.png" width="250"/></a>
  </div>
  <div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
      <li class="uk-active navbar"><a href="../index.php">PÁGINA INICIAL</a></li>
      <li class="navbar"><a href="../perfil.php"> PERFIL </a></li>
      <li class="navbar"><a href="../req_alu.php"> LIVROS REQUISITADOS </a></li>
      <li class="navbar"><a href="../logout.php"> SAIR </a></li>
    </ul>
  </div>
</nav>
<?php } else { ?>
<nav class="uk-navbar-container" uk-navbar>
  <div class="uk-navbar-left">
    <a class="uk-navbar-item uk-logo" href="../index.php"><img src="img/logo.png" width="250"/></a>
  </div>
  <div class="uk-navbar-right">
    <ul class="uk-navbar-nav">
      <li class="uk-active navbar"><a href="../index.php">PÁGINA INICIAL</a></li>
      <li class="navbar"><a href="../login.php"> LOGIN </a></li>
      <li class="navbar"><a href="../register.php"> REGISTAR </a></li>
    </ul>
  </div>
</nav>
<?php } ?>
