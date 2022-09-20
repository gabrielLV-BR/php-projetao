<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");
require_once("../dao/vehicle.php");

if(
  !isset($_POST["placa"]) ||
  !isset($_POST["fabricante"]) ||
  !isset($_POST["modelo"]) ||
  !isset($_POST["cor"])
) {
  error_out("Placa, Fabricante, Modelo e Cor dever ser informados");
  die();
}

set_exception_handler(function() {
  error_out("Erro ao cadastrar veículo");
  die();
});

$placa = $_POST["placa"];
$fabricante = $_POST["fabricante"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];

$connection = new SQLConnection();

$veiculo = get_vehicle($placa);

if(is_array($res) && count($res) > 0) {
  message_out("Placa já cadastrada");
  die();
}

if (register_vehicle($placa, $fabricante, $modelo, $cor)) {
  if(isset($_POST["Registering"])) {
    $_SESSION["placa"] = $placa;
    header("Location: ./car_entry.php");
  } else {
    message_out("Veículo registrado com sucesso", "../views/home.php");
  }
} else {
  error_out("Erro ao registrar veículo", "../views/home.php");
}
?>