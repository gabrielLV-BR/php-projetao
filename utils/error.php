<?php
    function error_out(string $message) {
        $_SESSION["Error"] = $message;
        header("Location: ../index.php");
    }
?>