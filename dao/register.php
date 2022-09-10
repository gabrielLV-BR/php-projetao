<?php 
    session_start();
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
            "INSERT INTO usuarios (username, password) VALUES (:username, :password);",
            [ ":username" => $username, ":password" => $password ]);
    } catch (Exception $e) {
        error_out("Nome de usuário já cadastrado");
    }

    if (is_array($res)) {
        message_out("Registrado com sucesso");
    } else {
        error_out("Erro ao registrar-se");
    }
    
    die();
?>