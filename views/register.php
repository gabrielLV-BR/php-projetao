<?php 
  include_once("../configure.php"); 
  session_start();
?>

<?php require("./partials/header.php"); ?>
    <h1>REGISTRAR</h1>
  <form action="../dao/register.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input type="text" name="username" id="username"><br>

    <label for="password">Senha</label>
    <input type="password" name="password" id="password"><br>
    
    <input type="submit" value="Login">
  </form>
<?php require("./partials/footer.php"); ?>