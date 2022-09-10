<?php 
  session_start(); 
  require_once("./configure.php"); 
  $STYLESHEETS = array("error.css");
?>

<?php include("./views/partials/header.php"); ?>

  <?php 
    if(isset($_SESSION["Error"])) {
      $error = $_SESSION["Error"]["Message"];
      $type  = $_SESSION["Error"]["Type"];
      echo "<button class='message $type'>$error</button>";
      unset($_SESSION["Error"]);
    }
  ?>
  <script defer src="/public/js/error.js"></script>

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