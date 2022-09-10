<?php
function message_out(string $message, string $location = "../index.php") {
    $_SESSION["Error"] = [
        "Message" => $message,
        "Type" => "msg"
    ];
    header("Location: $location");
}

function error_out(string $message, string $location = "../index.php") {
    $_SESSION["Error"] = [
        "Message" => $message,
        "Type" => "error"
    ];
    header("Location: $location");
}
?>