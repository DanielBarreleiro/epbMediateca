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
      <a class="uk-navbar-item uk-logo" href="../index.php"><img src="../img/logo.png" width="250"/></a>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        <li class="uk-active navbar"><a href="index.php">PÁGINA INICIAL</a></li>
        <li class="navbar"><a href="dashboard.php"> DASHBOARD </a></li>
      </ul>
    </div>
  </nav>
  <body>
    <div class="uk-margin" style="text-align: center">
      <h2>Admin Dashboard</h2>
    </div>
    <hr style="width: 85%;" class="uk-align-center">
    <div uk-grid class="admindash">
      <div class="tlivros dashboardsec">
        <a href="livros.php">
          <img class="admindashico" src="../includes/icons/11-Content/02-Books/1024w/book-close-2.png" alt="">
          <p>Livros</p>
          <?php
          $result = mysqli_query($con, "SELECT * FROM tblbooks");
          $num_rows = mysqli_num_rows($result);
          echo "<p>$num_rows</p>";
           ?>
        </a>
      </div>
      <div class="treq dashboardsec">
        <a href="req.php">
          <img class="admindashico" src="../includes/icons/11-Content/02-Books/1024w/book-upload.png" alt="">
          <p>Requisições</p>
          <?php
          $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails");
          $num_rows = mysqli_num_rows($result);
          echo "<p>$num_rows</p>";
           ?>
        </a>
      </div>
      <div class="tdev dashboardsec">
        <a href="dev.php">
          <img class="admindashico" src="../includes/icons/11-Content/02-Books/1024w/book-download.png" alt="">
          <p>Devoluções</p>
          <?php
          $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails WHERE ReturnStatus = 1");
          $num_rows = mysqli_num_rows($result);
          echo "<p>$num_rows</p>";
           ?>
        </a>
      </div>
      <div class="tpordev dashboardsec">
        <a href="pordev.php">
          <img class="admindashico" src="../includes/icons/11-Content/02-Books/1024w/book-warn.png" alt="">
          <p>Por Devolver</p>
          <?php
          $result = mysqli_query($con, "SELECT * FROM tblissuedbookdetails WHERE ReturnStatus = 0");
          $num_rows = mysqli_num_rows($result);
          echo "<p>$num_rows</p>";
           ?>
        </a>
      </div>
      <div class="talu dashboardsec">
        <a href="#">
          <img class="admindashico" src="../includes/icons/36-School-Learning/04-Library-Reading/1024w/read-human.png" alt="">
          <p>Alunos Registados</p>
          <?php
          $result = mysqli_query($con, "SELECT * FROM tblstudents");
          $num_rows = mysqli_num_rows($result);
          echo "<p>$num_rows</p>";
           ?>
        </a>
      </div>
    </div>
  </body>
</html>
