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
if(isset($_GET['del']))
{
$id = $_GET['del'];
$sql = "DELETE FROM tblbooks  WHERE id=$id";
$consulta = mysqli_query($con, $sql);
$_SESSION['delmsg'] = "Deleted";
header("Refresh:2; url=livros.php");
if ($_SESSION['delmsg'] == "Deleted") {
  echo "<br>";
  echo '<script>let timerInterval
      swal.fire({
        title: "Livro Eliminado!",
        icon: "success",
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          swal.showLoading()
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === swal.DismissReason.timer) {
          console.log("I was closed by the timer")
        }
      })</script>';
}
}
?>
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
          <tr><td>#</td><td>ISBN</td><td>Título</td><td>Autor</td><td>Categoria</td><td>-  -</td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.id as bookid from tblbooks join tblcategory on tblcategory.id = tblbooks.CatId JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId";
              $consulta = mysqli_query($con, $sql);
              if( !$consulta ){
                  echo "Erro ao realizar a consulta.";
                  exit;
              }
              $cnt = 1;
              while( $dados = mysqli_fetch_assoc($consulta) ){ //----Limpeza de código, utilização da linguagem SQL, para juntar dados das tabelas, evitando conversoes dos dados em PHP desnecessárias
                echo "<tr>";
                echo "<td>" . $cnt . "</td>";
                echo "<td>" . $dados['BookName']. "</td>";
                echo "<td>" . $dados['CategoryName']. "</td>";
                echo "<td>" . $dados['AuthorName']. "</td>";
                echo "<td>" . $dados['ISBNNumber']. "</td>";
                echo "<td>" . "<a href='edit-book.php?bookid=" . $dados['bookid'] . "'><button class='uk-button uk-button-primary'><span uk-icon='icon: pencil'> </span> Editar</button>" . "<a href='livros.php?del=" . $dados['bookid'] . "'><button class='uk-button uk-button-danger'><span uk-icon='icon: trash'> </span> Eliminar</button>" . "</td>";
                //Botoes DIFICULADE
                echo "</tr>";
                $cnt += 1;
              }
          ?>
      </table>
    </div>
  </body>
</html>
