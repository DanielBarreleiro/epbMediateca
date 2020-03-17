//falta fazer com que iato funcione--probs eliminar tudo e fazer de novo
<?php
require '../config/config.php';
if(!empty($_POST["bookid"])) {
  $bookid=$_POST["bookid"];

    $sql ="SELECT BookName,id FROM tblbooks WHERE (ISBNNumber=:bookid)";
$query= $dbh -> prepare($sql);
$query-> bindParam(':bookid', $bookid, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
  foreach ($results as $result) {?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BookName);?></option>
<b>Nome do Livro :</b>
<?php
echo htmlentities($result->BookName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
 else{?>
  -->
<option class="others"> Referência Inválida</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
