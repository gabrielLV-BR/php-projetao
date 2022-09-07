<?php 
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

    if ($connection->query("
        INSERT INTO clientes (username, password) 
        VALUES (:username, :password);",
        [ ":username" => $username, ":password" => $password]
    )) {
        message_out("Registrado com sucesso");
    } else {
        error_out("Erro ao registrar-se");
    }
    
    die();
?>