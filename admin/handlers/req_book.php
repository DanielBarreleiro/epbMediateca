<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
<?php
  $StudentId = "";
  $ISBNNumber = "";

  if(isset($_POST['req_book'])) {
    //ID Aluno
    $StudentId = strtoupper($_POST["StudentId"]); //converte tudo para maiúsculo

    //Código Livro / Referência / ISBNNumber
    $ISBNNumber = strtoupper($_POST["ISBNNumber"]); //converte tudo para maiúsculo

    header("Refresh:2; url=req.php");

    $query = mysqli_query($con, "INSERT INTO tblissuedbookdetails (ISBNNumber, StudentID) VALUES ('$ISBNNumber', '$StudentId')");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Livro Requisitado!",
          icon: "success",
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
  }
?>
