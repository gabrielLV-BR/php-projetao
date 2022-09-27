<?php 
if(session_status() != PHP_SESSION_ACTIVE) session_start();;
require_once("../utils/message.php");
require_once("../db/connection.php");

if(
  !isset($_POST["password"]) ||
  !isset($_POST["username"])
) {
  error_out("Senha|Nome não podem ser vazios!");
  die();
}

$username = trim($_POST["username"]);
$password = password_hash(trim($_POST["password"]), PASSWORD_BCRYPT);

$connection = new SQLConnection();

$res = [];
try {
  $res = $connection->query(
    "SELECT * FROM usuarios WHERE username = :username;",
    [ ":username" => $username ]
  );
} catch (Exception $e) {
  error_out("Erro na conexão com o banco de dados");
}

if(is_array($res) && count($res) > 0) {
  error_out("Nome de usuário já cadastrado");
  die();
}

try {
  $res = $connection->query(
    "INSERT INTO usuarios (username, password) VALUES (:username, :password);",
    [ ":username" => $username, ":password" => $password ]
  );
} catch (Exception $e) {
  error_out("Erro na conexão com o banco de dados");
}

if (is_array($res)) {
  message_out("Registrado com sucesso");
} else {
  error_out("Erro ao registrar-se");
}

die();
?>