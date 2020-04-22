<?php
require 'config/config.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>epbMediateca</title>
    <link href="css/uikit.css" rel="stylesheet" type="text/css" />
	  <link href="css/master.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <?php include 'includes/header.php'; ?>
  <body>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Livros Requisitados</p>
      <div class="">
        <table class="uk-table uk-table-striped uk-table-responsive uk-float-right reqalutable" style="width: 95%;">
          <tr><td></td><td>#</td><td>Referência</td><td>Título</td><td>Data de Requisição</td><td>Data de Devolução Prevista</td><td>Estado</td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT tblissuedbookdetails.ISBNNumber, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ExpectedDate, tblissuedbookdetails.ReturnStatus, tblbooks.BookName from tblissuedbookdetails join tblbooks on tblissuedbookdetails.ISBNNumber = tblbooks.ISBNNumber WHERE StudentID = '$sid' ORDER BY ReturnStatus";
              $consulta = mysqli_query($con, $sql);
              if( !$consulta ){
                  echo "Erro ao realizar a consulta.";
                  exit;
              }
              $cnt = 1;
              while( $dados = mysqli_fetch_assoc($consulta) ){
                $today = date('d/m/Y');
                //converter as data do formato MM-DD-YY para DD/MM/YY
                $IssuesDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3/$2/$1", $dados['IssuesDate']);
                $ExpectedDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3/$2/$1", $dados['ExpectedDate']);

                //Se a data de devolução for ultrapassada, a linha fica a vermelho
                if ($today > $ExpectedDate AND $dados['ReturnStatus'] == 0) {
                  echo "<tr style='background-color: #f0506e6b;' >";
                }

                //converter o estado de "0" para "Por devolver" e "1" para "Devolvido"
                if ($dados['ReturnStatus'] == 0) {
                  $estado = "<span class='uk-label uk-label-danger'>Por Devolver</span>";
                }
                if ($dados['ReturnStatus'] == 1) {
                  $estado = "<span class='uk-label uk-label-success'>Devolvido</span>";
                }

                echo "<td>" . " " . "</td>";
                echo "<td class='blacktext'>" . $cnt . "</td>";
                echo "<td class='blacktext'>" . $dados['ISBNNumber'] . "</td>";
                echo "<td class='blacktext'>" . $dados['BookName'] . "</td>";
                echo "<td class='blacktext'>" . $IssuesDate . "</td>";
                echo "<td class='blacktext'>" . $ExpectedDate .  "</td>";
                echo "<td class='blacktext'>" . $estado .  "</td>";
                echo "</tr>";
                $cnt += 1;
              }
          ?>
        </table>
      </div>
    </div>
  </body>
</html>
