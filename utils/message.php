<?php
    function message_out(string $message) {
        $_SESSION["Message"] = $message;
        $_SESSION["Type"] = "msg";
        header("Location: ../index.php");
    }
    
    function error_out(string $message) {
        $_SESSION["Message"] = $message;
        $_SESSION["Type"] = "error";
        header("Location: ../index.php");
    }
?>