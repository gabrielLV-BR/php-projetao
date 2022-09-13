<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

require_once("../dao/vehicle.php");

if(
  !isset($_POST["placa"])
) {
  error_out("Por favor, informe a placa", "../views/home.php");
  die();
}

$connection = new SQLConnection();
set_exception_handler(function($e) {
  error_out($e);
  die();
});

$veiculo = get_vehicle(trim($_POST["placa"]));

if($veiculo == null) {
  // Veículo não cadastrado
  header("Location: ../views/car_register.php");
  die();
}

$_SESSION["Car"] = $veiculo;

$time = date("Y-m-d H:i:s", $date->getTimestamp());

if(!isset($_SESSION["Cars"])) { $_SESSION["Cars"] = []; }

if(isset($_SESSION["Cars"][$id]) == 1) {
  // Está no estacionamento e agora vai sair
  car_out($veiculo);
} else {
  // Não está no estacionamento e agora vai entrar
  car_in($veiculo);
}

header("Location: ../views/home.php");

?>