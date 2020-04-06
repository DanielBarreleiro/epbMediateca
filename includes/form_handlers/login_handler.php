<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
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

  $sid = mysqli_query($con, "SELECT StudentId FROM tblstudents WHERE email='$email'");
  $sidrow = mysqli_fetch_array($sid);
  $sid = $sidrow['StudentId'];

  if (password_verify($password, $hash)) {
    header("Refresh:1; url=index.php");
    $_SESSION['stdid'] = $sid;
    $_SESSION['login'] = '';
    $_SESSION['username'] = $username;
    echo "<br>";
    echo '<script>let timerInterval
          swal.fire({
            title: "Logado com sucesso!",
            icon: "success",
            html: "Vais ser redirecionado.",
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
    exit();
  }
  else {
    header("Refresh:2; url=login.php");
    echo "<br>";
    echo '<script>let timerInterval
          swal.fire({
            title: "A palavra-passe está incorreta!",
            icon: "error",
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
    exit();
  }
}

 ?>
</html>
