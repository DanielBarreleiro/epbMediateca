<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
<?php
//declaração de variáveis
$fname = ""; //primeiro nome
$em = ""; //email
$phone = "";
$password = ""; //password
$reg_date = ""; //data de registo
$error_array = array(); //guarda mensagens de erro

$sid = $_SESSION['stdid'];

if(isset($_POST['update_button'])) {
  //valores do fomrulário de registo

  //Primeiro nome
  $fname = strip_tags($_POST['upd_fname']); //remove tags html
  $fname = ucwords(strtolower($fname)); //converte tudo para minúculas (apenas primeira letra de cada palavra maiúscula)
  $_SESSION['upd_fname'] = $fname; //guarda nome para variável da sessão
  //email
  $em = strip_tags($_POST['upd_email']); //remove tags html
  $em = str_replace(' ', '', $em); //remove espaços
  $em = strtolower($em); //converte tudo para minúculas
  $_SESSION['upd_email'] = $em; //guarda email para variável da sessão
  //telemovel
  $phone = strip_tags($_POST['upd_phone']); //remove tags html
  $phone = str_replace(' ', '', $phone); //remove espaços
  $_SESSION['upd_phone'] = $phone; //guarda nº tel para variável da sessão

  //verificar se o email tem um formato válido
  if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

    $em = filter_var($em, FILTER_VALIDATE_EMAIL);

  }
  else {
    array_push($error_array, "Formato inválido<br>");
  }

  if(strlen($fname) > 60 || strlen($fname) < 2){
    array_push($error_array, "O nome tem de ter entre 2 e 60 caracteres<br>");
  }

  if (empty($error_array)) {
    header("Refresh:1; url=perfil.php");

    //enviar todos os dados para a base de dados
    $query = mysqli_query($con, "UPDATE tblstudents SET FullName = '$fname', email = '$em', phone = '$phone' WHERE StudentId = '$sid'");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Dados Atualizados!",
          icon: "success",
          html: "Vais ser redirecionado em 1 segundo.",
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

    //limpar dados da sessão
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_phone'] = "";
  }


}

 ?>
</html>
