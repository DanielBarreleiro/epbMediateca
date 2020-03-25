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
$id = ""; //id aluno
$phone = "";
$password = ""; //password
$reg_date = ""; //data de registo
$error_array = array(); //guarda mensagens de erro

if(isset($_POST['register_button'])) {
  //valores do fomrulário de registo

  //Primeiro nome
  $fname = strip_tags($_POST['reg_fname']); //remove tags html
  $fname = ucwords(strtolower($fname)); //converte tudo para minúculas (apenas primeira letra de cada palavra maiúscula)
  $_SESSION['reg_fname'] = $fname; //guarda nome para variável da sessão
  //email
  $em = strip_tags($_POST['reg_email']); //remove tags html
  $em = str_replace(' ', '', $em); //remove espaços
  $em = strtolower($em); //converte tudo para minúculas
  $_SESSION['reg_email'] = $em; //guarda email para variável da sessão
  //idea
  $id = strip_tags($_POST['reg_id']); //remove tags html
  $id = str_replace(' ', '', $id); //remove espaços
  $id = strtolower($id); //converte tudo para minúculas
  $_SESSION['reg_id'] = $id; //guarda email para variável da sessão
  //telemovel
  $phone = strip_tags($_POST['reg_phone']); //remove tags html
  $phone = str_replace(' ', '', $phone); //remove espaços
  $_SESSION['reg_phone'] = $phone; //guarda nº tel para variável da sessão
  //password
  $password = strip_tags($_POST['reg_password']); //remove tags html

  //$reg_date = date("Y-m-d"); //data atual

  //verificar se o email tem um formato válido
  if (filter_var($em, FILTER_VALIDATE_EMAIL)) {

    $em = filter_var($em, FILTER_VALIDATE_EMAIL);

    //verificar se email já esta registado
    $e_check = mysqli_query($con, "SELECT email FROM tblstudents WHERE email='$em'");

    //conta o número de linhas
    $num_rows = mysqli_num_rows($e_check);

    if($num_rows > 0) {
      array_push($error_array, "Email já em uso<br>");
    }


  }
  else {
    array_push($error_array, "Formato inválido<br>");
  }


  if(strlen($fname) > 25 || strlen($fname) < 2){
    array_push($error_array, "O nome tem de ter entre 2 e 25 caracteres<br>");
  }

  $phone_check = mysqli_query($con, "SELECT phone FROM tblstudents WHERE phone='$phone'");

  //conta o número de linhas
  $num_rows = mysqli_num_rows($phone_check);

  if($num_rows > 0) {
    array_push($error_array, "Nº Telemóvel já em uso<br>");
  }

  if ( !preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $password)){
    echo "<script>('A password tem de ter no mínimo uma letra maúscula e um número!!')</script>";
  }


  if(strlen($password) > 50 || strlen($password) < 5) {
    array_push($error_array, "<script>alert('A password tem de ter entre 5 e 50 caracteres')</script>");
  }

  if (empty($error_array)) {
    header("Refresh:2; url=index.php");

    //Enviar email de confirmação
    require_once 'config/email.php';

    $password = password_hash($password, PASSWORD_BCRYPT);
    //encriptar a password antes de ser enviada para a base de dados, é misturado com SALT automaticamente
    //tipo de encriptação: BCRYPT
    //a hash resultante é enviada para a base de dados

    //enviar todos os dados para a base de dados
    $query = mysqli_query($con, "INSERT INTO tblstudents (StudentId, FullName, email, phone, password) VALUES ('$id', '$fname', '$em', '$phone', '$password')");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Foste Registado, já podes fazer login!",
          icon: "success",
          html: "Vais ser redirecionado em 2 segundos.",
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

    //limpar dados da sessão
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_phone'] = "";
  }


}

 ?>
</html>
