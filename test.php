<?php
echo password_hash("123", PASSWORD_BCRYPT);
$hash = password_hash("123", PASSWORD_BCRYPT);
echo "<br>";
if (password_verify("123", $hash)) {
  echo "success";
}
else {
  echo "no success";
}
?>

-----------

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
  </head>
  <body>
    <?php // dificuldade
      echo '<script>
          swal.fire("Our First Alert", "With some body text and success icon!", "success");
      </script>';
    ?>
  </body>
</html>
