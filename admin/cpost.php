<?php
require '../config/config.php';
require 'handlers/post_handler.php';
if(isset($_SESSION['alogin']))
{
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <?php include 'header/header.php' ?>
  <body>
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="livros.php">Livros</a></li>
        <li><a href="posts.php">Notícias</a></li>
        <li><a href="dev.php">Devoluções</a></li>
        <li><a href="pordev.php">Por Devolver</a></li>
        <li><a href="reg_alu.php">Alunos Registados</a></li>
        <hr>
        <li><a href="req.php">Requisitar</a></li>
        <li><span uk-icon="icon: chevron-double-right"></span>Adicionar Notícia</li>
        <li><a href="addbook.php">Adiconar Livro</a></li>
        <li><a href="addautor.php">Adicionar Autor</a></li>
        <li><a href="addcat.php">Adicionar Categoria</a></li>
      </ul>
    </div>
    <div class="zone uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Adicionar Notícia</p>
      <div class="uk-margin">
      </div>
      <div class="postform">
        <h4 class="">Adicionar Notícia</h4>
        <form action="cpost.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon:  info"></span>
              <input class="uk-input" type="text" placeholder="Título" name="titulo" autocomplete="off" uk-tooltip="title: Título da notícia; pos: right" required />
            </div>
          </div>
          <div class="uk-margin">
            <div class="uk-inline">
              <span>Sempre que quiser inserir outra linha, use ; (ponto e vírgula)</span>
              <textarea class="uk-input uk-form-width-large" style="height: 200px;" type="text" rows="5" placeholder="Mensagem" name="msg" autocomplete="off" uk-tooltip="title: Mensagem da notícia; pos: right" required></textarea>
            </div>
          </div>
          <button type="submit" name="cpost" class="uk-button uk-button-default uk-button-primary">Adicionar</button>
        </form>
        (note que apenas são mostradas 3 notícias na página principal)
      </div>
      <img class="sideimg" style="margin-right: 5%;" src="../img/news.svg" alt="">
    </div>
  </body>
</html>
<?php
}
else {
   include 'header/areturn.php';
}
?>
