<?php
require '../config/config.php';
require 'handlers/add_cat.php';
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
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Adicionar Categoria</p>
      <div class="loginform">
        <h4 class="">Adicionar Categoria</h4>
        <form action="addcat.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: folder"></span>
              <input class="uk-input" type="text" placeholder="Categoria" name="category" autocomplete="off" uk-tooltip="title: Categoria; pos: right" required />
            </div>
          </div>
          <button type="submit" name="add" class="uk-button uk-button-default uk-button-primary">Adicionar</button>
        </form>
      </div>
      <!--<img class="sideimg" src="../img/books.svg" alt="">-->
    </div>
  </body>
</html>
