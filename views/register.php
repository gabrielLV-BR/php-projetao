<?php
session_start();
?>

<?php require("./components/header.php"); ?>

<h1>REGISTRAR</h1>
<form action="../dao/register.php" method="POST">
  <label for="username">Nome de usuário:</label>
  <input required type="text"  name="username" id="username"><br>

  <label for="password">Senha</label>
  <input required type="password" name="password" id="password"><br>

  <input type="submit" value="Login">
</form>

<?php require("./components/footer.php"); ?>