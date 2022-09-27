<?php
if(session_status() != PHP_SESSION_ACTIVE) session_start();
require_once("../verify.php");

$STYLESHEETS = array("car_register.css");
?>

<?php require("./components/header.php"); ?>

<div class="container">
  <h1>REGISTRAR VEÍCULO</h1>
  <form action="../actions/car_register.php" method="POST">

    <label for="placa">Placa</label>
    <input type="text" name="placa" id="placa" pattern="[A-z]{3}\d{4}" placeholder="ABC1234" maxlength="7" value="<?= $_SESSION["placa"] ?? "" ?>">
    <small style="font-size: 0.9rem; font-style: italic;">A placa deve seguir o padrão</small>
    
    <label for="fabricante">Fabricante</label>
    <input type="text" name="fabricante" id="fabricante">
    
    <label for="modelo">Modelo</label>
    <input type="text" name="modelo" id="modelo">
    
    <label for="cor">Cor</label>
    <input type="text" name="cor" id="cor">
    
    <input type="submit" value="Registrar">
  </form>
</div>

<?php require("./components/footer.php"); ?>