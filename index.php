<?php require_once("./configure.php"); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estacionamentos Porreta</title>
  <link rel="stylesheet" href="/public/css/error.css">
</head>

<body>

  <?php 
    if(isset($_SESSION["Error"])) {
      $error = $_SESSION["Error"];
      echo "<button id='error'>$error</button>";
    }
  ?>
  <script src="/public/js/error.js"></script>

  <form action="./dao/login.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Senha</label>
    <input type="password" name="password" id="password"><br>
    
    <input type="submit" value="Login">
  </form>
  <a href="./views/forgot.php">Esqueceu a senha?</a><br>
  <a href="./views/register.php">Criar conta</a>
</body>
</html>