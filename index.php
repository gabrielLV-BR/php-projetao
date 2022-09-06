<?php 
  require_once("configure.php");
  require_once("./db/connection.php");

  configure();

  $connection = new SQLConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Usuários</h1>
  <?php 
    $users = $connection->query("SELECT username FROM usuarios", []);
  ?>
  <?php foreach($users as $user):  ?>
      <h2> <?= $user["username"] ?></h2>
  <?php endforeach ?>
</body>
</html>