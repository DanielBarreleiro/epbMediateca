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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <script>
      // function for get student name
      function getstudent() {
        jQuery.ajax({
        url: "get_student.php",
        data:'StudentId='+$("#StudentId").val(),
        type: "POST",
        success:function(data){
        $("#get_student_name").html(data);
        },
        error:function (){}
        });
      }

      //function for book details
      function getbook() {
        jQuery.ajax({
        url: "get_book.php",
        data:'ISBNNumber='+$("#ISBNNumber").val(),
        type: "POST",
        success:function(data){
        $("#get_book_name").html(data);
        },
        error:function (){}
        });
      }

    </script>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Requisitar Livro</p>
      <div class="loginform">
        <h4 class="">Requisitar Livro</h4>
        <form class="" role="form" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input class="uk-input" type="text" placeholder="ID Aluno (Ex: gpsi173670)" name="StudentId" id="StudentId" onBlur="getstudent()" autocomplete="off"  required />
            </div>
          </div>
          <span id="get_student_name" style="font-size:16px;"></span>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: tag"></span>
              <input class="uk-input" type="text" placeholder="Referência ou Título" name="ISBNNumber" id="ISBNNumber" onBlur="getbook()" required="required" />
            </div>
          </div>
          <span id="get_book_name" style="font-size:16px;"></span>
          <div class="uk-margin">
            <div class="uk-inline">
              <!--<select  class="uk-select" id="form-stacked-select" name="bookdetails" id="get_book_name" readonly>

              </select>-->
            </div>
          </div>
          <button type="submit" name="issue" id="submit" class="uk-button uk-button-default uk-button-primary">Requisitar </button>
        </form>
      </div>
    </div>
  </body>
</html>
