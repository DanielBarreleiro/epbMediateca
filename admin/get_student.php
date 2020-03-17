<?php
require '../config/config.php';
if(!empty($_POST["studentid"])) {
  $studentid= strtoupper($_POST["studentid"]);

    $sql ="SELECT FullName,Status FROM tblstudents WHERE StudentId=:studentid";
$query = 
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->Status==0)
{
echo "<span style='color:red'> Aluno Bloqueado </span>"."<br />";
echo "<b>Student Name-</b>" .$result->FullName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php
echo htmlentities($result->FullName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{

  echo "<span style='color:red'> ID inválido, por favor insira um ID válido .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
