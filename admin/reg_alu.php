<?php
require '../config/config.php';
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
<?php
include 'header/header.php';
?>
  <body>
    <script type="text/javascript">
    // function for get student name
    function getstudent() {
      jQuery.ajax({
      url: "get_alu.php",
      data:'StudentId='+$("#StudentId").val(),
      type: "POST",
      success:function(data){
      $("#get_student_name").html(data);
      },
      error:function (){}
      });
    }
    </script>
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="livros.php">Livros</a></li>
        <li><a href="posts.php">Notícias</a></li>
        <li><a href="dev.php">Devoluções</a></li>
        <li><a href="pordev.php">Por Devolver</a></li>
        <li><span uk-icon="icon: chevron-double-right"></span>Alunos Registados</li>
        <hr>
        <li><a href="req.php">Requisitar</a></li>
        <li><a href="cpost.php">Adicionar Notícia</a></li>
        <li><a href="addbook.php">Adiconar Livro</a></li>
        <li><a href="addautor.php">Adicionar Autor</a></li>
        <li><a href="addcat.php">Adicionar Categoria</a></li>
      </ul>
    </div>
    <div class="zone uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Alunos Registados</p>
      <div class="">
        <div class="uk-search uk-search-default">
          <div class="uk-search">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="search" placeholder="Nº Aluno" name="StudentId" id="StudentId" uk-tooltip="title: Ex: gpsi173670; pos: right">
          </div>
          <button type="submit" name="button" class="uk-button uk-button-primary" onclick="getstudent()">Pesquisar</button>
        </div>
        <span id="get_student_name" style="font-size:16px;"></span>
      </div>
    </div>
    <div class="">
      <table class="uk-table uk-table-striped uk-table-responsive uk-float-right" style="width: 86%;">
          <tr><td></td><td>#</td><td>Nº Aluno</td><td>Nome</td><td>Email</td><td>Nº Tel</td><td></td></tr>
          <?php
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT * FROM tblstudents";
              $consulta = mysqli_query($con, $sql);
              if( !$consulta ){
                  echo "Erro ao realizar a consulta.";
                  exit;
              }
              $cnt = 1;
              while( $dados = mysqli_fetch_assoc($consulta) ){ //----Limpeza de código, utilização da linguagem SQL, para juntar dados das tabelas, evitando conversoes dos dados em PHP desnecessárias
                echo "<tr>";
                echo "<td>" . " " . "</td>";
                echo "<td>" . $cnt . "</td>";
                echo "<td>" . $dados['StudentId']. "</td>";
                echo "<td>" . $dados['FullName']. "</td>";
                echo "<td>" . $dados['email']. "</td>";
                echo "<td>" . $dados['phone']. "</td>";
                echo "<td>" . " " . "</td>";
                echo "</tr>";
                $cnt += 1;
              }
          ?>
      </table>
    </div>
  </body>
</html>
<?php
}
else {
   include 'header/areturn.php';
}
?>
