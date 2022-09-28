<?php 
if(session_status() != PHP_SESSION_ACTIVE) session_start(); // Inicia sessão
session_unset(); // Limpa as variáveis da sessão
session_destroy(); // Destrói sessão

header("Location: ../index.php"); // Volta pra telas inicial
?>