<?php
require '../config/config.php';

if(!empty($_POST["ISBNNumber"])) {
  $ISBNNumber=strtoupper($_POST["ISBNNumber"]);

  $sql = "SELECT BookName, id FROM tblbooks WHERE ISBNNumber='$ISBNNumber'";
  $query = mysqli_query($con, $sql);
  $cnt=1;
  $num_rows = mysqli_num_rows($query);
  while ($row = mysqli_fetch_assoc($query)) {
    $BookName = $row['BookName'];
    $id = $row['id'];
  }
  if($num_rows > 0)
  {
    echo utf8_encode($BookName);
    echo "<script>$('#submit').prop('disabled',false);</script>";
  }
  else{
    echo "Referência Inválida";
    echo "<br><span style='color:red'>(O Livro já foi adicionado à Base de dados?)</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }
}



?>
