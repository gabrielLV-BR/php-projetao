<?php 
  if(isset($_SESSION["Error"])) {
    $error = $_SESSION["Error"]["Message"];
    $type  = $_SESSION["Error"]["Type"];
    echo "<script defer src='/public/js/error.js'></script>";
    echo "<button class='message $type'>$error</button>";
    unset($_SESSION["Error"]);
  }
?>