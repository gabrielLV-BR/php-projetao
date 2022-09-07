<?php 

  define("DB_HOST", "localhost");
  define("DB_PORT", "3308");
  define("DB_USERNAME", "gabriellv");
  define("DB_PASSWORD", "gabriellv");
  define("DB_SCHEMA", "estacionamento");

  class SQLConnection {
    private static ?PDO $_con = null;
    function __construct() {
      if(SQLConnection::$_con == null) {
        $schema   = DB_SCHEMA;
        $user     = DB_USERNAME;
        $password = DB_PASSWORD;
        $host     = DB_HOST;
        $port     = DB_PORT;
        
        $dsn = "mysql:dbname=$schema;host=$host;port=$port";

        SQLConnection::$_con = new PDO($dsn, $user, $password);
      }
    }

    function query(string $query, array $vars = []) {
      $q = SQLConnection::$_con->query($query);
      foreach ($vars as $key => $val) {
        $q->bindValue($key, $val);
      }
      $q->execute();
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>