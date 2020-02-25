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
      <p class="p18" >Registar</p>
      <div class="loginform">
        <h4 class="">Registar</h4>
        <form class="" action="register.php" method="post">
          <!--START REG username-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input  type="text" name="reg_fname" class="uk-input" placeholder="Nome Completo" value="<?php
                if (isset($_SESSION['reg_fname'])) {
                  echo $_SESSION['reg_fname'];
                }
                ?>" required>
                <br>
                <?php if (in_array("O primeiro nome tem de ter entre 2 e 25 caracteres<br>", $error_array)) {
                  echo "O primeiro nome tem de ter entre 2 e 25 caracteres<br>";
                } ?>
            </div>
          </div>
          <!--END username-->
          <!--START email-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input type="email" name="reg_email" class="uk-input" type="text" placeholder="Email da escola" value="<?php
                if (isset($_SESSION['reg_email'])) {
                  echo $_SESSION['reg_email'];
                }
                ?>" required>
                <br>
                <?php if (in_array("Email já em uso<br>", $error_array)) {echo "Email já em uso<br>";}
                else if (in_array("Formato inválido<br>", $error_array)) {echo "Formato inválido<br>";} ?>
            </div>
          </div>
          <!--END email-->
          <!--START phone-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                <input type="number" name="reg_phone" class="uk-input" type="text" placeholder="Nº Telemóvel" value="<?php
                if (isset($_SESSION['reg_phone'])) {
                  echo $_SESSION['reg_phone'];
                }
                ?>" required>
                <br>
                <?php if (in_array("Nº telemóvel já em uso<br>", $error_array)) {echo "Nº telemóvel já em uso<br>";}?>
            </div>
          </div>
          <!--END phone-->
          <!--START password-->
          <div class="uk-margin">
              <div class="uk-inline">
                  <span class="uk-form-icon" uk-icon="icon: lock"></span>
                  <input class="uk-input" type="password" placeholder="Palavra-passe" name="reg_password" required>
                  <br>
                  <?php if (in_array("A password tem de ter no mínimo uma letra maúscula e um número!!<br>", $error_array)) {echo "A password tem de ter no mínimo uma letra maúscula e um número!!<br>";}
                  else if (in_array("A password tem de ter entre 5 e 50 caracteres<br>", $error_array)) {echo "A password tem de ter entre 5 e 50 caracteres<br>";} ?>
              </div>
          </div>
          <!--END password-->
          <input class="uk-button uk-button-default uk-button-primary" type="submit" name="register_button" value="Registar">
        </form>
        <p><a href="#">Esqueceu-se da palavra-passe?</a></p>
      </div>
    </div>
  </body>
</html>
