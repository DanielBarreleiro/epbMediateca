<?php
require '../config/config.php';
if(!empty($_POST["StudentId"])) {
  $StudentId= strtoupper($_POST["StudentId"]);

  $sql = "SELECT FullName, Status FROM tblstudents WHERE StudentId='$StudentId'";
  $query = mysqli_query($con, $sql);
  $cnt=1;
  $num_rows = mysqli_num_rows($query);
  while ($row = mysqli_fetch_assoc($query)) {
    $FullName = $row['FullName'];
    $Status = $row['Status'];
  }
  if($num_rows > 0)
  {
    if($Status == 0){
      echo "<span style='color:red'> Aluno Bloqueado </span>"."<br />";
      echo "<b>Student Name-</b>" . $FullName;
      echo "<script>$('#submit').prop('disabled',true);</script>";
    }
    else {
      echo htmlentities($FullName);
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
  else{
    echo "<span style='color:red'> ID inválido, por favor insira um ID válido. (Ex: gpsi173670)</span>";
    echo "<script>$('#submit').prop('disabled',true);</script>";
  }
}


?>
