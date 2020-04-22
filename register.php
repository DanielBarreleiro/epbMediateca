<?php
require 'config/config.php';
require 'includes/form_handlers/login_handler.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/uikit.css" rel="stylesheet" />
	  <link href="css/master.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <?php include 'includes/header.php' ?>
  <body>
    <?php require 'includes/form_handlers/register_handler.php'; ?>
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
                <input  type="text" name="reg_fname" class="uk-input" placeholder="Nome Completo" uk-tooltip="title: Nome Nome Apelido; pos: right" value="<?php
                if (isset($_SESSION['reg_fname'])) {
                  echo $_SESSION['reg_fname'];
                }
                ?>" required>
                <br>
                <?php if (in_array("O primeiro nome tem de ter entre 2 e 60 caracteres<br>", $error_array)) {
                  echo "O primeiro nome tem de ter entre 2 e 60 caracteres<br>";
                } ?>
            </div>
          </div>
          <!--END username-->
          <!--START email-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input type="email" name="reg_email" class="uk-input" type="text" placeholder="Email da escola" uk-tooltip="title: email@alunos.epb.pt; pos: right" value="<?php
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
          <!--START ID-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: tag"></span>
                <input type="text" name="reg_id" class="uk-input" type="text" placeholder="Nº Aluno" uk-tooltip="title: Ex: gpsi173670; pos: right" value="<?php
                if (isset($_SESSION['reg_id'])) {
                  echo $_SESSION['reg_id'];
                }
                ?>" required>
                <br>
                <?php if (in_array("ID já em uso<br>", $error_array)) {echo "ID já em uso<br>";}
                else if (in_array("Formato inválido<br>", $error_array)) {echo "Formato inválido<br>";} ?>
            </div>
          </div>
          <!--END ID-->
          <!--START phone-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                <input type="number" name="reg_phone" class="uk-input" type="text" placeholder="Nº Telemóvel" uk-tooltip="title: 912345678; pos: right" value="<?php
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
                  <input class="uk-input" type="password" placeholder="Palavra-passe" name="reg_password" uk-tooltip="title: Tem de ter no mínimo 5 caracteres, uma letra maiúscula e um número!; pos: right" required>
                  <br>
                  <?php if (in_array("<script>('A password tem de ter no mínimo uma letra maúscula e um número!!')</script>", $error_array)) {echo "<script>('A password tem de ter no mínimo uma letra maúscula e um número!!')</script>";}
                  else if (in_array("<script>alert('A password tem de ter entre 5 e 50 caracteres')</script>", $error_array)) {echo "<script>alert('A password tem de ter entre 5 e 50 caracteres')</script>";} ?>
              </div>
          </div>
          <!--END password-->
          <input class="uk-button uk-button-default uk-button-primary" type="submit" name="register_button" value="Registar">
        </form>
        <p>Já tens conta? Faz login <a href="login.php">aqui</a></p>
      </div>
      <img class="sideimg" src="img/register.svg" alt="">
    </div>
  </body>
</html>
