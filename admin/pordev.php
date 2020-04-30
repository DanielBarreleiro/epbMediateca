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
    <script language="JavaScript" type="text/javascript">
      function checkdev(){
          return confirm('Quer mesmo devolver este livro?');
      }
    </script>
    <script language="JavaScript" type="text/javascript">
      function checkwarn(){
          return confirm('Quer mesmo avisar o aluno?');
      }
    </script>
  </head>
  <?php
    //-----
    if(isset($_GET['dev']))
    {
    $today = date('Y-m-d');
    $id = $_GET['dev'];
    $sql = "UPDATE tblissuedbookdetails SET ReturnDate = '$today', ReturnStatus = 1 WHERE tblissuedbookdetails.id = $id";
    $consulta = mysqli_query($con, $sql);
    $_SESSION['devmsg'] = "Returned";
    header("Refresh:1; url=pordev.php");
    if ($_SESSION['devmsg'] == "Returned") {
      echo "<br>";
      echo '<script>let timerInterval
          swal.fire({
            title: "Livro Devolvido!",
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
    //-----
    if(isset($_GET['warn']))
    {
    $id = $_GET['warn'];
    $name = $_GET['name'];
    $isbn = $_GET['isbn'];
    $sql = "SELECT email from tblissuedbookdetails JOIN tblstudents ON tblissuedbookdetails.StudentID = tblstudents.StudentId AND tblissuedbookdetails.StudentID = '$id' WHERE ReturnStatus = 0";
    $consulta = mysqli_query($con, $sql);
    $dados = mysqli_fetch_assoc($consulta);
    $em = $dados['email'];
    $_SESSION['warnmsg'] = "Warned";
    //Enviar email de aviso
    require_once '../config/warn.php';
    header("Refresh:1; url=pordev.php");
    if ($_SESSION['warnmsg'] == "Warned") {
      echo "<br>";
      echo '<script>let timerInterval
          swal.fire({
            title: "Aluno Avisado!",
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
   ?>
  <?php include 'header/header.php' ?>
  <body>
    <div class="zonesidebar uk-align-left">
      <hr class="zonesidetop">
      <ul style="font-size: 90%;">
        <li><a href="livros.php">Livros</a></li>
        <li><a href="posts.php">Notícias</a></li>
        <li><a href="dev.php">Devoluções</a></li>
        <li><span uk-icon="icon: chevron-double-right"></span>Por Devolver</li>
        <li><a href="reg_alu.php">Alunos Registados</a></li>
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
      <p class="p18" ><a href="../index.php">Painel Admin </a><span uk-icon="icon: chevron-double-right"></span> Por Devolver</p>
    </div>
    <div class="">
      <table class="uk-table uk-table-striped uk-table-responsive uk-float-right" style="width: 86%;">
          <tr><td></td><td>#</td><td>Referência</td><td>Nome / Nº Aluno</td><td>Data de Requisição</td><td>Data de Devolução Prevista</td><td>-</td></tr>
          <?php
              //Estabelece a ligação com o mysql ALTERNATIVA AO LOGIN COM INCLUDE
              mysqli_set_charset($con,"utf8"); // resolve a questão dos acentos e cedilhas
              $sql = "SELECT tblissuedbookdetails.id, tblissuedbookdetails.ISBNNumber, tblissuedbookdetails.StudentID, tblissuedbookdetails.IssuesDate, tblissuedbookdetails.ExpectedDate, tblissuedbookdetails.ReturnStatus, tblstudents.FullName from tblissuedbookdetails join tblstudents on tblstudents.StudentId = tblissuedbookdetails.StudentID join tblbooks on tblissuedbookdetails.id = tblbooks.id WHERE ReturnStatus = 0";
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
                //converter as data do formato MM-DD-YY para DD/MM/YY
                $ExpectedDate = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/", "$3/$2/$1", $dados['ExpectedDate']);

                //Se a data de devolução for ultrapassada, a linha fica a vermelho e mostra um botao para avisar o aluno
                if ($today > $ExpectedDate) {
                  echo "<tr style='background-color: #f0506e6b;' >";
                }
                echo "<td>" . " " . "</td>";
                echo "<td>" . $cnt . "</td>";
                echo "<td>" . $dados['ISBNNumber'] . "</td>";
                echo "<td>" . $dados['FullName'] . "<br>" . $dados['StudentID'] . "</td>";
                echo "<td>" . $IssuesDate . "</td>";
                echo "<td>" . $ExpectedDate .  "</td>";
                if ($today > $ExpectedDate) {
                  echo "<td>" . "<a href='pordev.php?warn=" . $dados['StudentID'] . '&name=' . $dados['FullName'] . '&isbn=' . $dados['ISBNNumber'] . "' onclick='return checkwarn()'><button class='uk-button uk-button-danger' style='width: 75%';><span uk-icon='icon: warning'> </span> Avisar Aluno</button></a>" . "<div style='height: 5px;'></div>" . "<a href='pordev.php?dev=" . $dados['id'] . "' onclick='return checkdev()'><button class='uk-button uk-button-primary' style='width: 75%';><span uk-icon='icon: pull'></span> Devolver</button></a>" . "</td>";
                }
                else {
                  echo "<td>" . "<a href='pordev.php?dev=" . $dados['id'] . "' onclick='return checkdev()'><button class='uk-button uk-button-primary' style='width: 75%';><span uk-icon='icon: pull'> </span> Devolver</button></a>" . "</td>";
                }
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
