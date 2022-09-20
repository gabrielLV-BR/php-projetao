<?php
session_start();

require_once("../verify.php");

$STYLESHEETS = array("home.css", "car_viewer.css", "error.css");
?>

<?php require("./components/header.php"); ?>
<?php require("./components/error_viewer.php"); ?>

<div class="container">
  <h1 class="welcome">Bem vindo, <i><?= $_SESSION["username"] ?></i></h1>
  <span class="row">
    <section class="inputs">
      <hr>
      <form action="../actions/car_entry.php" method="POST">
        <label for="placa">Placa do veículo</label>
        <input type="text" name="placa" id="placa" maxlength="7" required>

        <input type="submit" value="Enviar">
    </section>
    <section class="viewer">
      <?php require("./components/car_viewer.php") ?>
    </section>
    </form>
  </span>
  <span>
    <a href="../actions/logout.php" class="logout">Logout</a>
  </span>
</div>

<?php require("./components/footer.php"); ?>