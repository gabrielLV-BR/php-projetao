<?php session_start(); ?>

<?php require("./components/header.php"); ?>

<!-- //TODO Estilizar -->
<h1>HOME</h1>
<h2>Seja bem-vindo, <?= $_SESSION["username"]; ?></h2>

<?php require("./components/car_viewer.php") ?>

<h1 class="text-3xl font-bold underline">
  Hello world!
</h1>

<form action="../actions/car_entry.php" method="POST">

  <label for="placa">Placa do veículo</label>
  <input type="text" name="placa" id="placa">

  <input type="submit" value="Enviar">

</form>

<a href="../actions/logout.php">Logout</a>

<?php require("./components/footer.php"); ?>