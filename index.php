<?php 
  if(session_status() != PHP_SESSION_ACTIVE) session_start();;
  $STYLESHEETS = array("error.css", "index.css");

  if(isset($_SESSION["username"])) {
    header("Location: views/home.php");
    die();
  }
?>

<?php include("./views/components/header.php"); ?>
<?php include("./views/components/error_viewer.php"); ?>

<main class="container">
  <form action="./actions/login.php" method="POST">
    <label for="username">Nome de usuário:</label>
    <input required class="form-control" type="text" name="username" id="username"><br>
    
    <label for="password">Senha</label>
    <input required type="password" name="password" id="password"><br>
    
    <input type="submit" value="Login">
  </form>
  <hr>
  <a href="./views/forgot.php">Esqueceu a senha?</a><br>
  <a href="./views/register.php">Criar conta</a>
</main>

<?php require("./views/components/footer.php"); ?>