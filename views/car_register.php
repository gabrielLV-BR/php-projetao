<?php
session_start();
include_once("../configure.php");

print_r($_POST);
?>

<?php require("./partials/header.php"); ?>

<h1>REGISTRAR VEÍCULO</h1>
<form action="../dao/car_register.php" method="POST">
  <label for="username">Nome de usuário:</label>
  <input required type="text"  name="username" id="username"><br>

  <label for="password">Senha</label>
  <input required type="password" name="password" id="password"><br>

  <input type="submit" value="Login">
</form>

<?php require("./partials/footer.php"); ?>