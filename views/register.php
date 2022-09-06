<?php 
  session_start();
  include_once("../configure.php"); 
  include_once("../utils/error.php");
  error_out("Tu é broxa KKKKKKKKK");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estacionamentos Porreta</title>
</head>
<body>
    <h1>REGISTRAR</h1>
  <form action="../dao/register.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Senha</label>
    <input type="password" name="password" id="password"><br>
    
    <input type="submit" value="Login">
  </form>
</body>
</html>