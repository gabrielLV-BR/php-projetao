<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

$date = new DateTime();
$date->setTimezone(new DateTimeZone("UCT"));

//TODO Abstrair em funções
if(
  !isset($_POST["placa"])
) {
  error_out("Por favor, informe a placa", "../views/home.php");
  die();
}

$placa = trim($_POST["placa"]);

$connection = new SQLConnection();

set_exception_handler(function($e) {
  error_out($e);
  die();
});

$veiculo = $connection->query(
  "SELECT * FROM veiculos WHERE placa = :placa;",
  [ ":placa" => $placa ]
);

if(is_array($veiculo) && count($veiculo) == 0) {
  // Veículo não cadastrado
  header("Location: ../views/car_register.php");
  die();
}

$_SESSION["Car"] = $veiculo[0];

$time = date("Y-m-d H:i:s", $date->getTimestamp());

if(!isset($_SESSION["Cars"])) { $_SESSION["Cars"] = []; }

echo "<pre>";
print_r($_SESSION);
echo "</pre><hr>";

echo "issset(\$_SESSION[\"Cars\"][\$id]) -> " . isset($_SESSION["Cars"][$id]) . "<br>";

if(isset($_SESSION["Cars"][$id]) == 1) {
  // Está no estacionamento e agora vai sair

  $hr_entrada = $_SESSION["Cars"][$id]["hr_entrada"];
  $hr_saida = $date->getTimestamp();

  $preco = ($hr_saida - $hr_entrada) / 3600;
  
  $_SESSION["Car"]["hr_saida"] = $hr_saida;
  $_SESSION["Car"]["preco"] = $preco;
  
  //TODO Atualiza banco
  
  // Remove do estacionamento
  unset($_SESSION["Cars"][$id]);
  echo "issset(\$_SESSION[\"Cars\"][\$id]) -> " . isset($_SESSION["Cars"][$id]) . "<br>";
  // die();
} else {
  // Não está no estacionamento e agora vai entrar
  $_SESSION["Cars"][$id] = $veiculo[0];
  $_SESSION["Cars"][$id]["hr_entrada"] = $date->getTimestamp();
}

header("Location: ../views/home.php");

?>