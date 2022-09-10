<?php
require_once(__DIR__ . "/utils/env.php");
require_once(__DIR__ . "/db/connection.php");

if(!isset($_SESSION["CONFIGURED"])) {
  new SQLConnection();
}
?>