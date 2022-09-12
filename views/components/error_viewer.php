<?php 
  if(isset($_SESSION["Error"])) {
    $error = $_SESSION["Error"]["Message"];
    $type  = $_SESSION["Error"]["Type"];
    echo "<button class='message $type'>$error</button>";
    unset($_SESSION["Error"]);
  }
?>
<script defer src="/public/js/error.js"></script>