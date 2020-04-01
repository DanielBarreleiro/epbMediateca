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
    <div class="uk-margin">
      <div class="uk-search uk-search-default">
        <div class="uk-search">
          <span uk-search-icon></span>
          <input id="catInput" class="uk-search-input" type="search" placeholder="Pesquisar...">
        </div>
        <button type="submit" name="button" class="uk-button uk-button-primary" onclick="catSearch()" >Pesquisar</button>
        <button type="submit" name="button" class="uk-button uk-button-secondary" onclick="catClear()" >Limpar Filtros</button>
      </div>
    </div>
    <div class="bookstable">
      <table class="uk-table uk-table-striped uk-table-responsive">
          <tr><td>#</td><td>Referência</td><td>ID Aluno</td><td>Multa</td></tr>
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
                echo "<td>" . $cnt . "</td>";
                echo "<td>" . $dados['ISBNNumber'] . "</td>";
                echo "<td>" . $dados['StudentID'] . "</td>";
                echo "<td>" . $dados['fine'] . "€</td>";
                echo "<td>";
                echo "</tr>";
                $cnt += 1;
              }
          ?>
      </table>
    </div>
  </body>
</html>
