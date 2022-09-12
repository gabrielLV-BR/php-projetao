<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

$date = new DateTime();
$date->setTimezone(timezone_open("Brazil/East"));

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

// impossível da query não retornar nada
$id = $veiculo[0]["id"];

$res = $connection->query(
  "SELECT * FROM entrada_saida e WHERE e.veiculo = :id AND hr_saida IS NULL ORDER BY hr_entrada DESC LIMIT 1;",
  [ ":id" => $id ]
);

$_SESSION["Car"] = $veiculo[0];

if(is_array($res) && count($res) == 0) {
  // Se o veículo estiver entrando...
  $connection->query(
    "INSERT INTO entrada_saida (veiculo, hr_entrada) VALUES (:id, :time);",
    [ ":id" => $id, ":time" => date("Y-m-d H:i:s", $date->getTimestamp()) ]
  );
} else {
  // Se estiver saindo...
  // Atualiza o banco
  $connection->query(
    "UPDATE entrada_saida e SET hr_saida = :time WHERE e.veiculo = :id;",
    [ ":id" => $id, ":time" => date("Y-m-d H:i:s", $date->getTimestamp()) ]
  );

  // Pega horário de entrada
  $hr_entrada = $connection->query(
    "SELECT hr_entrada FROM entrada_saida WHERE veiculo = :id", [ "id" => $id ]
  )[0]["hr_entrada"];

  echo "Hr_entrada sem filtro: $hr_entrada<br>";

  $hr_entrada = strtotime($hr_entrada);
  $hr_saida = $date->getTimestamp() + $date->getOffset();

  echo "Horário de entrada: $hr_entrada<br>";
  echo "Horário de saída: $hr_saida<br>";

  echo "HOráio de saída cu: " . date("Y-m-d H:i:s", $hr_saida) . "<br>";

  $diff = ($hr_saida - $hr_entrada);

  echo "Diff: $diff";

  $_SESSION["Car"]["hr_entrada"] = $hr_entrada;
  $_SESSION["Car"]["hr_saida"] = $hr_saida;
  $_SESSION["Car"]["custo"] = $diff * 5.5;
}

header("Location: ../views/home.php");

?>