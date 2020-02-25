<?php
ob_start(); //ativa o buffer de saída
session_start();

$timezone = date_default_timezone_set("Europe/Lisbon");

$con = mysqli_connect("localhost", "root", "", "epbmediateca"); //variável de conexão

if (mysqli_connect_errno())
{
  echo "Failed to connect: " . mysqli_connect_errno();
}

?>
