<?php
  require 'config/config.php';

  /*$sql0 = "TRUNCATE TABLE admin";
  $query0 = mysqli_query($con, $sql0);*/

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      if(isset($_POST['regbu'])) {
        $fname = $_POST['fname'];
        $email = $_POST['mail'];
        $password = $_POST['pass'];

      //$password = '4kzVQFwsJ$JRjyCz';

        $password = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO admin (FullName, AdminEmail, Password) VALUES ('$fname', '$email', '$password')";
        $query = mysqli_query($con, $sql);

        echo $sql;

      }
     ?>
    <form action="createadmin.php" method="post">
      <input type="text" name="fname" value="">
      <input type="text" name="mail" value="">
      <input type="text" name="pass" value="">
      <input type="submit" name="regbu" value="">
    </form>
  </body>
</html>
