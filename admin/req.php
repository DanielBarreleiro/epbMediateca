<?php
require '../config/config.php';
require 'handlers/req_book.php';
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
  <?php include 'header/header.php' ?>
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
        <form action="req.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <input class="uk-input" type="text" placeholder="Nº Aluno" name="StudentId" id="StudentId" onBlur="getstudent()" autocomplete="off" uk-tooltip="title: Ex: gpsi173670; pos: right" required />
            </div>
          </div>
          <span id="get_student_name" style="font-size:16px;"></span>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: tag"></span>
              <input class="uk-input" type="text" placeholder="Referência" name="ISBNNumber" id="ISBNNumber" onBlur="getbook()" uk-tooltip="title: Ex: TECNO003; pos: right" required="required" />
            </div>
          </div>
          <span id="get_book_name" style="font-size:16px;"></span>
          <div class="uk-margin">
            <div class="uk-inline">
            </div>
          </div>
          <button type="submit" name="req_book" id="submit" class="uk-button uk-button-default uk-button-primary">Requisitar</button>
        </form>
      </div>
    </div>
  </body>
</html>
