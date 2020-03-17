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
          <tr><td>ISBN</td><td>Título</td><td>Categoria</td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              $ligacao = mysqli_connect("localhost","root","","epbMediateca");
              mysqli_set_charset($ligacao,"utf8"); // resolve a questão dos acentos e cedilhas
              if( !$ligacao ){
                  echo "Erro na ligação à base de dados.";
                  exit;
              }
              $sql = "SELECT * FROM tblbooks ORDER BY id";
              $consulta = mysqli_query($ligacao, $sql);
              if( !$consulta ){
                  echo "Erro ao realizar a consulta.";
                  exit;
              }
              while( $dados = mysqli_fetch_assoc($consulta) ){
                if ($dados['CatId'] == '8') {
                  $dados['CatId'] = 'Informática';
                }
                if ($dados['CatId'] == '9') {
                  $dados['CatId'] = 'Tecnologias Administrativas';
                }
                if ($dados['CatId'] == '10') {
                  $dados['CatId'] = 'Biologia';
                }
                if ($dados['CatId'] == '11') {
                  $dados['CatId'] = 'Construção Civil';
                }
                if ($dados['CatId'] == '12') {
                  $dados['CatId'] = 'Contabilidade e Gestão';
                }
                if ($dados['CatId'] == '13') {
                  $dados['CatId'] = 'Design Gráfico';
                }
                if ($dados['CatId'] == '14') {
                  $dados['CatId'] = 'Direito';
                }
                if ($dados['CatId'] == '15') {
                  $dados['CatId'] = 'Educação Informação';
                }
                if ($dados['CatId'] == '16') {
                  $dados['CatId'] = 'Eletrónica';
                }
                if ($dados['CatId'] == '17') {
                  $dados['CatId'] = 'Física-Química';
                }
                if ($dados['CatId'] == '18') {
                  $dados['CatId'] = 'Francês';
                }
                if ($dados['CatId'] == '19') {
                  $dados['CatId'] = 'Inglês';
                }
                if ($dados['CatId'] == '20') {
                  $dados['CatId'] = 'Marketing';
                }
                if ($dados['CatId'] == '21') {
                  $dados['CatId'] = 'Matemática';
                }
                if ($dados['CatId'] == '22') {
                  $dados['CatId'] = 'Português';
                }
                  echo "<tr>";
                  echo "<td>" .$dados['ISBNNumber']. "</td>";
                  echo "<td>" .$dados['BookName']. "</td>";
                  echo "<td>" .$dados['CatId']. "</td>";
                  echo "<td>";
                  echo "</tr>";
              }
          ?>
      </table>
    </div>
  </body>
</html>
