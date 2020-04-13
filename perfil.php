<?php
require 'config/config.php';
require 'includes/form_handlers/perfil_handler.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>epbMediateca</title>
    <link href="css/uikit.css" rel="stylesheet" type="text/css" />
	  <link href="css/master.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="js/uikit.js" charset="utf-8"></script>
    <script src="js/uikit-icons.js" charset="utf-8"></script>
  </head>
  <?php include 'includes/header.php'; ?>
  <body>
    <div class="login uk-align-right">
      <hr class="top">
      <p class="p18" >Editar Perfil</p>
      <div class="loginform">
        <h4 class="">Editar Perfil</h4>
        <form class="" action="perfil.php" method="post">
          <!--START username-->
          <?php
            $data_query = mysqli_query($con, "SELECT FullName, email, phone FROM tblstudents where StudentId = '$sid'");
            $data_row = mysqli_fetch_array($data_query);
          ?>
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: user"></span>
                <input  type="text" name="upd_fname" class="uk-input" placeholder="Nome Completo" uk-tooltip="title: Nome Nome Apelido; pos: right" value="<?php
                echo $data_row['FullName']; ?>">
            </div>
          </div>
          <!--END username-->
          <!--START email-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: mail"></span>
                <input type="email" name="upd_email" class="uk-input" type="text" placeholder="Email da escola" uk-tooltip="title: email@alunos.epb.pt; pos: right" value="<?php
                echo $data_row['email']; ?>">
            </div>
          </div>
          <!--END email-->
          <!--START ID-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: tag"></span>
                <input type="text" name="upd_id" class="uk-input uk-disabled" type="text" placeholder="Nº Aluno" uk-tooltip="title: Ex: gpsi173670; pos: right" value="<?php
                echo "$sid"; ?>">
            </div>
          </div>
          <!--END ID-->
          <!--START phone-->
          <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                <input type="number" name="upd_phone" class="uk-input" type="text" placeholder="Nº Telemóvel" uk-tooltip="title: 912345678; pos: right" value="<?php
                echo $data_row['phone']; ?>">
            </div>
          </div>
          <!--END phone-->
          <input class="uk-button uk-button-default uk-button-primary" type="submit" name="update_button" value="Submeter">
        </form>
      </div>
    </div>
  </body>
