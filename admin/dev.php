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
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <?php include 'header/header.php' ?>
  <body>
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="livros.php">Livros</a></li>
        <li><a href="req.php">Requisitar</a></li>
        <li><span uk-icon="icon: chevron-double-right"></span>Devoluções</li>
        <li><a href="pordev.php">Por Devolver</a></li>
        <li><a href="reg_alu.php">Alunos Registados</a></li>
        <hr>
        <li><a href="addbook.php">Adiconar Livro</a></li>
        <li><a href="addautor.php">Adicionar Autor</a></li>
        <li><a href="addcat.php">Adicionar Categoria</a></li>
      </ul>
    </div>
    <div class="zone uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Devoluções</p>
    </div>
    <div class="">
      <table class="uk-table uk-table-striped uk-table-responsive uk-float-right" style="width: 86%;">
          <tr><td></td><td>#</td><td>Referência</td><td>Nº Aluno</td><td>Data de Devolução</td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT * FROM tblissuedbookdetails WHERE ReturnStatus = 1";
              $consulta = mysqli_query($con, $sql);
              if( !$consulta ){
                  echo "Erro ao realizar a consulta.";
                  exit;
              }
              $cnt = 1;
              while( $dados = mysqli_fetch_assoc($consulta) ){
                echo "<tr>";
                echo "<td>" . " " . "</td>";
                echo "<td>" . $cnt . "</td>";
                echo "<td>" . $dados['ISBNNumber'] . "</td>";
                echo "<td>" . $dados['StudentID'] . "</td>";
                $ReturnDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3/$2/$1", $dados['ReturnDate']);
                echo "<td>" . $ReturnDate . "</td>";
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
