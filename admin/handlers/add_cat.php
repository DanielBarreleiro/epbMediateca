<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
<?php
  if(isset($_POST['add']))
  {

    //Código Livro / Referência / ISBNNumber
    $category = strtoupper($_POST['category']); //converte tudo para maiúsculo

    header("Refresh:2; url=addcat.php");

    $query = mysqli_query($con, "INSERT INTO tblcategory(CategoryName) VALUES ('$category')");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Categoria Adicionada!",
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
?>
