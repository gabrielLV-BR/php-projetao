<?php
require_once(__DIR__ . "/../utils/env.php");

class SQLConnection
{
  private static ?PDO $_con = null;
  function __construct()
  {
    if (SQLConnection::$_con == null) {
      if (session_status() != PHP_SESSION_ACTIVE) session_start();
      if (!isset($_SESSION["CONFIGURED"])) load_env();
      $host     = trim($_SESSION["Env"]["DB_HOST"] ?? "localhost");
      $port     = trim($_SESSION["Env"]["DB_PORT"] ?? "3306");
      $schema   = trim($_SESSION["Env"]["DB_SCHEMA"]);
      $user     = trim($_SESSION["Env"]["DB_USERNAME"]);
      $password = trim($_SESSION["Env"]["DB_PASSWORD"]);

      $dsn = "mysql:dbname=$schema;host=$host";
      SQLConnection::$_con = new PDO($dsn, $user, $password);

      // Mudamos a coluna `senha` porque não tava muito bom não
      $this->query("ALTER TABLE `estacionamento`.`usuarios` CHANGE COLUMN `password` `password` VARCHAR(60) NOT NULL;");
    }
  }

  function query(string $query, array $vars = [])
  {
    // $q = SQLConnection::$_con->query($query);
    // foreach ($vars as $key => $val) {
    //   $q->bindValue($key, $val);
    // }
    // $q->execute();
    // return $q->fetchAll(PDO::FETCH_ASSOC);
    $query = str_replace("\n", "", $query);
    $q = SQLConnection::$_con->prepare($query);
    $q->execute($vars);
    return $q->fetchAll();
  }
}