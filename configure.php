<?php
  require_once("utils/env.php");
  require_once("db/connection.php");

  function configure() {
    load_env();
    new SQLConnection();
  }
?>