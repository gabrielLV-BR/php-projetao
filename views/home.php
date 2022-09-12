<?php
include_once("../configure.php");
session_start();
?>

<?php require("./partials/header.php"); ?>

<!-- //TODO Estilizar -->
<h1>HOME</h1>
<h2>Seja bem-vindo, <?= $_SESSION["username"]; ?></h2>

<?php require("./partials/car_viewer.php") ?>

<form action="../dao/car_entry.php" method="POST">

  <label for="placa">Placa do veículo</label>
  <input type="text" name="placa" id="placa">

  <input type="submit" value="Enviar">

</form>

<a href="../dao/logout.php">Logout</a>

<?php require("./partials/footer.php"); ?>