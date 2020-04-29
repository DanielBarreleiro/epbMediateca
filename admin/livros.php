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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/uikit.css" rel="stylesheet" />
	  <link href="../css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script language="JavaScript" type="text/javascript">
      function checkDelete(){
          return confirm('Quer mesmo eliminar este livro?');
      }
    </script>
  </head>
<?php
if(isset($_GET['del']))
{
$id = $_GET['del'];
$sql = "DELETE FROM tblbooks  WHERE id=$id";
$consulta = mysqli_query($con, $sql);
$_SESSION['delmsg'] = 'Deleted';
header("Refresh:1; url=livros.php");
if ($_SESSION['delmsg'] == "Deleted") {
  echo "<br>";
  echo '<script>let timerInterval
      swal.fire({
        title: "Livro Eliminado!",
        icon: "success",
        timer: 1000,
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
include 'header/header.php';
?>
  <body>
    <script type="text/javascript">
    //function for book details
    function getbook() {
      jQuery.ajax({
      url: "get_bookdetail.php",
      data:'ISBNNumber='+$("#ISBNNumber").val(),
      type: "POST",
      success:function(data){
      $("#get_book_name").html(data);
      },
      error:function (){}
      });
    }
    </script>
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><span uk-icon="icon: chevron-double-right"></span>Livros</li>
        <li><a href="req.php">Requisitar</a></li>
        <li><a href="dev.php">Devoluções</a></li>
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
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Livros</p>
      <div class="">
        <div class="uk-search uk-search-default">
          <div class="uk-search">
            <span uk-search-icon></span>
            <input class="uk-search-input" type="text" placeholder="Referência" name="ISBNNumber" id="ISBNNumber" uk-tooltip="title: Ex: TECNO003; pos: right">
          </div>
          <button type="submit" name="button" class="uk-button uk-button-primary" onclick="getbook()" >Pesquisar</button>
        </div>
        <span id="get_book_name" style="font-size:16px;"></span>
      </div>
    </div>
    <div class="">
      <table class="uk-table uk-table-striped uk-table-responsive uk-float-right" id="tb" style="width: 86%;">
          <tr><td></td><td>#</td><td>Referência</td><td>Título</td><td>Autor</td><td>Categoria</td><td>-  -</td><td></td></tr>
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
                echo "<td>" . " " . "</td>";
                echo "<td>" . $cnt . "</td>";
                echo "<td id='ref'>" . $dados['ISBNNumber']. "</td>";
                echo "<td id='ref'>" . $dados['BookName']. "</td>";
                echo "<td style='width: 30%;'>" . $dados['AuthorName']. "</td>";
                echo "<td style='width: 15%;'>" . $dados['CategoryName']. "</td>";
                echo "<td style='width: 20%;'>" . "<a id='js-modal-confirm' href='livros.php?del=" . $dados['bookid'] ."'  onclick='return checkDelete()' ><button class='uk-button uk-button-danger' style='width: 95%;'><span uk-icon='icon: trash'> </span> Eliminar</button></a>" . "</td>";
                //Botoes DIFICULADE //botoes eliminavam ultimo, em vez de eliminar o clicado, agora está FIXED
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
