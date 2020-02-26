<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';
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
  </head>
  <nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">
      <a class="uk-navbar-item uk-logo" href="index.php"><img src="img/logo.png" width="250"/></a>
    </div>
    <div class="uk-navbar-right">
      <ul class="uk-navbar-nav">
        <li class="uk-active navbar"><a href="index.php">PÁGINA INICIAL</a></li>
        <li class="navbar"><a href="login.php"> LOGIN </a></li>
      </ul>
    </div>
  </nav>
  <body>
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
        <p><a href="#">Esqueceu-se da palavra-passe?</a></p>
        <p>Ainda não tens a tua conta? <a href="register.php">Registar</a></p>
      </div>
    </div>
  </body>
</html>
