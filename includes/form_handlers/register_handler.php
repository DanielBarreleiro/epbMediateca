<?php
//declaração de variáveis
$fname = ""; //primeiro nome
$em = ""; //email
$phone = "";
$password = ""; //password
$reg_date = ""; //data de registo
$error_array = array(); //guarda mensagens de erro

//Gerador de ID do aluno
$count_students = ("studentid.txt");
$hits = file($count_students);
$hits[0] ++;
$fp = fopen($count_students , "w");
fputs($fp , "$hits[0]");
fclose($fp);
$studentid= $hits[0];

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
    echo 'A password tem de ter no mínimo uma letra maúscula e um número!!<br>';
  }


  if(strlen($password) > 50 || strlen($password) < 5) {
    array_push($error_array, "A password tem de ter entre 5 e 50 caracteres<br>");
  }

  if (empty($error_array)) {
    $password = password_hash($password, PASSWORD_BCRYPT);
    //encriptar a password antes de ser enviada para a base de dados, é misturado com SALT automaticamente
    //tipo de encriptação: BCRYPT
    //a hash resultante é enviada para a base de dados

    //enviar todos os dados para a base de dados
    $query = mysqli_query($con, "INSERT INTO tblstudents (StudentId, FullName, email, phone, password) VALUES ('$studentid', '$fname', '$em', '$phone', '$password')");

    array_push($error_array, "<span style='color: #14C800;'>Foste Registado, $fname! Já podes fazer login!</span><br>");

    //limpar dados da sessão
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_phone'] = "";
  }


}

 ?>
