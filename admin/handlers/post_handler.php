<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
<?php
  if(isset($_POST['cpost'])) {
    $title = $_POST['titulo'];
    $msg = $_POST['msg'];
    $msg = str_replace(";", '<br />', $msg);
    $today = date('Y-m-d');

    header("Refresh:1.5; url=cpost.php");

    mysqli_set_charset($con,"utf8");
    $query = mysqli_query($con, "INSERT INTO posts (posttitle, postmsg, postdate) VALUES ('$title', '$msg', '$today')");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Notícia Adicionada!",
          icon: "success",
          timer: 1500,
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
 ?>
