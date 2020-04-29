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
  </head>
  <?php
    require '../config/config.php';
    include '../includes/header.php';
  ?>
  <body>
    <?php include 'catsidebar.php' ?> <!-- mostra a sidebar //OBJETIVO: menos codigo no meio, e podendo editar mais facilmente no futuro -->
    <div class="cat uk-align-right">
      <hr class="top">
      <p class="p18" ><a href="../index.php">Categorias</a><span uk-icon="icon: chevron-double-right"></span> Contabilidade e Gestão</p>
    </div>
    <div class="">
      <table class="uk-table uk-table-striped uk-table-responsive uk-float-right" style="width: 84%;">
          <tr><td></td><td>#</td><td>Referência</td><td>Título</td><td>Autor</td><td></td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT tblbooks.BookName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.id as bookid from tblbooks JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId WHERE CatId = 12";
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
                echo "<td>" . $dados['ISBNNumber']. "</td>";
                echo "<td>" . $dados['BookName']. "</td>";
                echo "<td>" . $dados['AuthorName']. "</td>";
                echo "<td>" . " " . "</td>";
                echo "</tr>";
                $cnt += 1;
              }
          ?>
      </table>
    </div>
  </body>
</html>
