<?php 

  class SQLConnection {
    private static ?PDO $_con = null;

    function __constructor() {
      if(SQLConnection::$_con == null) {
        if(
          !isset($_ENV["DB_HOST"]) ||
          !isset($_ENV["DB_USERNAME"]) ||
          !isset($_ENV["DB_PASSWORD"])
        ) {
          throw new Exception("Database Host|Username|Password not found in env!");
        }

        $dsn = "mysql:dbname=testdb;host=" . getenv("DB_HOST");
        $user = getenv("DB_USERNAME");
        $password = getenv("DB_PASSWORD");
        SQLConnection::$_con = new PDO($dsn, $user, $password);
      }
    }

    function query(string $query, array $vars) {
      $q = SQLConnection::$_con->query($query);
      foreach ($vars as $key => $val) {
        $q->bindValue($key, $val);
      }
      $q->execute();
      return $q->fetchAll(PDO::FETCH_ASSOC);
    }

  }


?>