<?php
require '../config/config.php';

if(!empty($_POST["StudentId"])) {
  $StudentId= strtoupper($_POST["StudentId"]);

  $sql = "SELECT FullName FROM tblstudents WHERE StudentId='$StudentId'";
  $query = mysqli_query($con, $sql);
  $cnt=1;
  $num_rows = mysqli_num_rows($query);
  while ($row = mysqli_fetch_assoc($query)) {
    $FullName = $row['FullName'];
  }
  if($num_rows > 0)
  {
    echo htmlentities($FullName);
    echo "<script>$('#submit').prop('disabled',false);</script>";
    echo "<script>$('#StudentId').addClass('uk-form-success');</script>";
  }
  else{
    echo "<span style='color:red'> ID inválido / inexistente, por favor insira um ID válido. (Ex: gpsi173670)</span>";
    echo "<br>";
    echo "<span style='color:red'>(O aluno está registado?)</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
    echo "<script>$('#StudentId').addClass('uk-form-danger');</script>";
  }
}


?>
