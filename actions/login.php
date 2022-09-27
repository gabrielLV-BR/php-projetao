<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

if (
  !isset($_POST["password"]) ||
  !isset($_POST["username"])
) {
  error_out("Senha|Nome não podem ser vazios!");
  die();
}

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$connection = new SQLConnection();

$user = $connection->query(
  "SELECT password FROM usuarios WHERE username=:username;",
  [":username" => $username ]
)[0];

if(password_verify($password, $user["password"])) {
  $_SESSION["username"] = $username;
  header("Location: ../views/home.php");
} else {
  error_out("Log-in inválido");
}

die();