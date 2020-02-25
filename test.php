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
