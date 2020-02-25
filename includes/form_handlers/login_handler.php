<?php

if (isset($_POST['log_email'])) {
  $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Elimina todos os caracteres menos letras, digitos e !#$%&'*+-=?^_`{|}~@.[].

  $hash = mysqli_query($con, "SELECT password FROM tblstudents WHERE email='$email'");

  $_SESSION['log_email'] = $email; //guarda email na variável de sessão
  $password = $_POST['log_password']; //obter password

  $username = mysqli_query($con, "SELECT FullName FROM tblstudents WHERE email='$email'");

  $hash = mysqli_fetch_array($hash);
  echo "$hash";

  if (password_verify($password, $hash)) {;
    $_SESSION['username'] = $username;
    echo "$username";
    header("Location: index.php");
    exit();
  }
  else {
    array_push($error_array, "Email ou password incorretos<br />");
  }
}

 ?>
