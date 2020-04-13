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
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="#">Livros</a></li>
        <li><span uk-icon="icon: chevron-double-right"></span>Requisitar</li>
        <li><a href="#">Devoluções</a></li>
        <li><a href="#">Por Devolver</a></li>
        <li><a href="#">Alunos Registados</a></li>
        <hr>
        <li><a href="#">Adiconar Livro</a></li>
        <li><a href="#">Adicionar Autor</a></li>
        <li><a href="#">Adicionar Categoria</a></li>
      </ul>
    </div>
    <div class="zone uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Requisitar</p>
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
              <span class="uk-form-icon" uk-icon="icon: calendar"></span>
              <input class="uk-input" type="date" placeholder="Data Prevista de Devolução" name="datadev" id="datadev" uk-tooltip="title: Escolha a data prevista para devolução; pos: right" required="required" />
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
            </div>
          </div>
          <button type="submit" name="req_book" id="submit" class="uk-button uk-button-default uk-button-primary">Requisitar</button>
        </form>
      </div>
      <img class="sideimg" src="../img/books.svg" alt="">
    </div>
  </body>
</html>
