<?php 
    require_once(__DIR__ . "/utils/message.php");

    if (!isset($_SESSION["username"])) {
        error_out("Sessão inválida");
        die();
    }
?>