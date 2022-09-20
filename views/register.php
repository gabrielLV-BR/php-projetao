<?php
session_start();

$STYLESHEETS = array("register.css");
?>

<?php require("./components/header.php"); ?>

<div class="container">
  <h1>REGISTRAR</h1>
  <form action="../actions/register.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input required type="text" name="username" id="username"><br>

    <label for="password">Senha</label>
    <input required type="password" name="password" id="password"><br>

    <input type="submit" value="Registrar">
  </form>
</div>

<?php require("./components/footer.php"); ?>