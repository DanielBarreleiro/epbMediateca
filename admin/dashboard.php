<?php
require '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/uikit.css" rel="stylesheet" />
	  <link href="../css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php"><img src="../img/logo.png" width="250"/></a>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        <li class="uk-active navbar"><a href="index.php">PÁGINA INICIAL</a></li>
        <li class="navbar"><a href="dashboard.php"> DASHBOARD </a></li>
      </ul>
    </div>
  </nav>
  <body>
    <div uk-grid style="margin-left: 5%;">
      <div class="tlivros">
        <span uk-icon="icon: book"></span>
        <p>Livros</p>
        <?php
        $result = mysqli_query($con, "SELECT * FROM tblbooks");
        $num_rows = mysqli_num_rows($result);
        echo "<p>$num_rows</p>";
         ?>
      </div>
      <div class="treq">
        <span uk-icon="icon: book"></span>
        <p>Requisições</p>
        <?php
        $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails");
        $num_rows = mysqli_num_rows($result);
        echo "<p>$num_rows</p>";
         ?>
      </div>
      <div class="tdev">
        <span uk-icon="icon: book"></span>
        <p>Devoluções</p>
        <?php
        $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails WHERE ReturnStatus = 0");
        $num_rows = mysqli_num_rows($result);
        echo "<p>$num_rows</p>";
         ?>
      </div>
      <div class="tpordev">
        <span uk-icon="icon: book"></span>
        <p>Por Devolver</p>
        <?php
        $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails WHERE ReturnStatus = 1");
        $num_rows = mysqli_num_rows($result);
        echo "<p>$num_rows</p>";
         ?>
      </div>
      <div class="talu">
        <span uk-icon="icon: book"></span>
        <p>Alunos Registados</p>
        <?php
        $result = mysqli_query($con, "SELECT * FROM tblstudents");
        $num_rows = mysqli_num_rows($result);
        echo "<p>$num_rows</p>";
         ?>
      </div>
    </div>
  </body>
</html>
