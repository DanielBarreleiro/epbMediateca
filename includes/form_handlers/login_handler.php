<html>
  <head>
    <link href="css/uikit.css" rel="stylesheet" />
	  <link href="css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
  </head>
</html>
<?php

if (isset($_POST['log_email'])) {
  $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); //Elimina todos os caracteres menos letras, digitos e !#$%&'*+-=?^_`{|}~@.[].

  $hash = mysqli_query($con, "SELECT password FROM tblstudents WHERE email='$email'");
  $hashrow = mysqli_fetch_array($hash);
  $hash = $hashrow['password'];

  $_SESSION['log_email'] = $email; //guarda email na variável de sessão
  $password = $_POST['log_password']; //obter password

  $username = mysqli_query($con, "SELECT FullName FROM tblstudents WHERE email='$email'");
  $usernamerow = mysqli_fetch_array($username);
  $username = $usernamerow['FullName'];

  if (password_verify($password, $hash)) {
    header("Refresh:3; url=index.php");
    $_SESSION['username'] = $username;
    echo "<div class='uk-alert-success' uk-alert><a class='uk-alert-close' uk-close></a><p>Foste logado com sucesso $username ! Vais ser redirecionado em 3 segundos.</p></div>";
    echo "<br><span uk-spinner='ratio: 2.5'></span>";
    exit();
  }
  else {
    array_push($error_array, "<script>alert('Email ou password incorretos')</script>");
  }
}

 ?>
