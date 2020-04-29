<?php
require '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/uikit.css" rel="stylesheet" />
	  <link href="../css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@9.8.2/dist/sweetalert2.min.css'>
    <script src="../js/uikit.js" charset="utf-8"></script>
    <script src="../js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <body>
    <?php require 'handlers/alogin_handler.php'; ?>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Login - Administrador</p>
      <div class="loginform">
        <h4 class="">Login - Administrador</h4>
        <form class="" action="login.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
              <span class="uk-form-icon" uk-icon="icon: lock"></span>
              <input name="log_password" class="uk-input" type="password" placeholder="Palavra-passe" required>
            </div>
          </div>
          <input class="uk-button uk-button-default uk-button-primary" type="submit" name="alogin_button" value="Login">
        </form>
      </div>
    </div>
  </body>
</html>
