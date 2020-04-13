<?php
require '../config/config.php';
require 'handlers/add_book.php';
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
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="#">Livros</a></li>
        <li><a href="#">Requisitar</a></li>
        <li><a href="#">Devoluções</a></li>
        <li><a href="#">Por Devolver</a></li>
        <li><a href="#">Alunos Registados</a></li>
        <hr>
        <li><span uk-icon="icon: chevron-double-right"></span>Adiconar Livro</li>
        <li><a href="#">Adicionar Autor</a></li>
        <li><a href="#">Adicionar Categoria</a></li>
      </ul>
    </div>
    <div class="zone uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Adicionar Livro</p>
      <div class="uk-margin">
      </div>
      <div class="loginform">
        <h4 class="">Adicionar Livro</h4>
        <form action="addbook.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: pencil"></span>
              <input class="uk-input" type="text" placeholder="Título" name="bookname" autocomplete="off" uk-tooltip="title: Título do livro; pos: right" required />
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: user"></span>
              <select class="uk-input uk-select" name="author" uk-tooltip="title: Selecione um item da lista; pos: right" required="required">
                <option value="">Selecionar Autor</option>
                <?php
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * from tblauthors";
                $query = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($query);
                while ($row = mysqli_fetch_assoc($query)) {
                  $AuthorName = $row['AuthorName'];
                  $id = $row['id'];
                  echo "<option value='$id'>$AuthorName </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: folder"></span>
              <select class="uk-input uk-select" name="category" uk-tooltip="title: Selecione um item da lista; pos: right" required="required">
                <option value="">Selecionar Categoria</option>
                <?php
                mysqli_set_charset($con, "utf8");
                $sql = "SELECT * from  tblcategory";
                $query = mysqli_query($con, $sql);
                $num_rows = mysqli_num_rows($query);
                while ($row = mysqli_fetch_assoc($query)) {
                  $CategoryName = $row['CategoryName'];
                  $id = $row['id'];
                  echo "<option value='$id'>$CategoryName </option>";
                }
                ?>
              </select>
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: tag"></span>
              <input class="uk-input" type="text" placeholder="Referência" name="isbn" uk-tooltip="title: Ex: TECNO003; pos: right" required="required" />
            </div>
          </div>
          <button type="submit" name="add" class="uk-button uk-button-default uk-button-primary">Adicionar</button>
        </form>
      </div>
      <!--<img class="sideimg" src="../img/books.svg" alt="">-->
    </div>
  </body>
</html>
