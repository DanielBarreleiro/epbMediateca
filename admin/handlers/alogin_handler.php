<?php

if (isset($_POST['alogin_button'])) {

  $hash = mysqli_query($con, "SELECT Password FROM admin WHERE AdminEmail='mediateca@epb.pt'");
  $hashrow = mysqli_fetch_array($hash);
  $hash = $hashrow['Password'];

  $password = $_POST['log_password']; //obter password

  if (password_verify($password, $hash)) {
    header("Refresh:1; url=index.php");
    $_SESSION['alogin'] = '';
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
