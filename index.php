<?php 
  session_start(); 
  require_once("./configure.php"); 
  $STYLESHEETS = array("error.css");
?>

<?php include("./views/partials/header.php"); ?>
<?php include("./views/partials/error_viewer.php"); ?>

  <form action="./dao/login.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Senha</label>
    <input type="password" name="password" id="password"><br>
    
    <input type="submit" value="Login">
  </form>
  <a href="./views/forgot.php">Esqueceu a senha?</a><br>
  <a href="./views/register.php">Criar conta</a>

<?php require("./views/partials/footer.php"); ?>