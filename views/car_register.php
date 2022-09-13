<?php
session_start();
?>

<?php require("./components/header.php"); ?>

<h1>REGISTRAR VEÍCULO</h1>
<form action="../actions/car_register.php" method="POST">

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

<?php require("./components/footer.php"); ?>