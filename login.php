<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/uikit.css" rel="stylesheet" />
	  <link href="css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  </head>
  <?php include 'includes/header.php' ?>
  <body>
    <?php require 'includes/form_handlers/login_handler.php'; ?>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Login</p>
      <div class="loginform">
        <h4 class="">Login</h4>
        <form class="" action="login.php" method="post">
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input type="email" name="log_email" class="uk-input" type="text" placeholder="Email da escola" uk-tooltip="title: email@alunos.epb.pt; pos: right" value="<?php
                if (isset($_SESSION['log_email'])) {
                  echo $_SESSION['log_email'];
                }
                ?>" required>
            </div>
          </div>
          <div class="uk-margin">
              <div class="uk-inline">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <input name="log_password" class="uk-input" type="password" placeholder="Palavra-passe" required>
                  <br>
                  <?php if (in_array("<script>alert('Email ou password incorretos')</script>", $error_array)) echo "<script>alert('Email ou password incorretos')</script>"; ?>
              </div>
          </div>
          <input class="uk-button uk-button-default uk-button-primary" type="submit" name="login_button" value="Login">
        </form>
        <p>Ainda não tens conta? <a href="register.php">Registar</a></p>
      </div>
      <img class="sideimg" src="img/auth.svg" alt="">
    </div>
  </body>
</html>
