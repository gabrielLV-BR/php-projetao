<?php
  include_once("./utils/env.php");
  include_once("./db/connection.php");

  if(!isset($_SESSION["CONFIGURED"])) {
    load_env();
    new SQLConnection();
  }
?>