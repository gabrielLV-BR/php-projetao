<?php
session_start();
include_once("../configure.php");

print_r($_POST);
?>

<?php require("./partials/header.php"); ?>

<h1>REGISTRAR VEÍCULO</h1>
<form action="../dao/car_register.php" method="POST">

  <label for="placa">Placa</label>
  <input type="text" name="placa" id="placa">

  <label for="fabricante">Fabricante</label>
  <input type="text" name="fabricante" id="fabricante">

  <label for="modelo">Modelo</label>
  <input type="text" name="modelo" id="modelo">

  <label for="cor">Cor</label>
  <input type="text" name="cor" id="cor">

  <input type="submit" value="Registrar">
</form>

<?php require("./partials/footer.php"); ?>