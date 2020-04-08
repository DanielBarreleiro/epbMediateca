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
    $isbn = strtoupper($_POST["isbn"]); //converte tudo para maiúsculo

    $bookname = strtoupper($_POST['bookname']); //converte tudo para maiúsculo

    $category = $_POST['category'];
    $author = $_POST['author'];

    header("Refresh:2; url=addbook.php");

    $query = mysqli_query($con, "INSERT INTO tblbooks(BookName, CatId, AuthorId, ISBNNumber) VALUES ('$bookname', $category, $author, '$isbn')");
    echo "<br>";
    echo '<script>let timerInterval
        swal.fire({
          title: "Livro Adicionado!",
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
