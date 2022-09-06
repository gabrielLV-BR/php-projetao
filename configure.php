<?php
  require_once("utils/env.php");
  if(!isset($_ENV["CONFIGURED"])) load_env();
  require_once("db/connection.php");
  new SQLConnection();
?>