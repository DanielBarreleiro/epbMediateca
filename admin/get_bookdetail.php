<?php
require '../config/config.php';

if(!empty($_POST["ISBNNumber"])) {
  $ISBNNumber=strtoupper($_POST["ISBNNumber"]);

  $sql = "SELECT tblbooks.BookName,tblcategory.CategoryName,tblauthors.AuthorName,tblbooks.ISBNNumber,tblbooks.id from tblbooks join tblcategory on tblcategory.id = tblbooks.CatId JOIN tblauthors ON tblauthors.id = tblbooks.AuthorId AND ISBNNumber='$ISBNNumber'";
  $query = mysqli_query($con, $sql);
  $cnt=1;
  $num_rows = mysqli_num_rows($query);
  while ($row = mysqli_fetch_assoc($query)) {
    $BookName = $row['BookName'];
    $author = $row['AuthorName'];
    $cat = $row['CategoryName'];
  }
  if($num_rows > 0)
  {
    echo htmlentities("Título: " . $BookName);
    echo "<br>";
    echo htmlentities("Autor: " . $author);
    echo "<br>";
    echo htmlentities("Categoria: " . $cat);
    echo "<script>$('#submit').prop('disabled',false);</script>";
    echo "<script>$('#ISBNNumber').addClass('uk-form-success');</script>";
  }
  else{
    echo "Referência Inválida";
    echo "<br><span style='color:red'>(O Livro já foi adicionado à Base de dados?)</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
    echo "<script>$('#ISBNNumber').addClass('uk-form-danger');</script>";
  }
}



?>
