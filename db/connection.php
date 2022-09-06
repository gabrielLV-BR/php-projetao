<?php 

  class SQLConnection {
    private static ?PDO $_con = null;

    function __construct() {
      if(SQLConnection::$_con == null) {
        if(
          !isset($_ENV["DB_HOST"]) ||
          !isset($_ENV["DB_USERNAME"]) ||
          !isset($_ENV["DB_PASSWORD"]) ||
          !isset($_ENV["DB_SCHEMA"])
        ) {
          throw new Exception("Database Host|Username|Password|Schema not found in env!");
        }

        $schema   = $_ENV["DB_SCHEMA"];
        $user     = $_ENV["DB_USERNAME"];
        $password = $_ENV["DB_PASSWORD"];
        $host     = $_ENV["DB_HOST"];
        
        $dsn = "mysql:dbname=$schema;host=$host";

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