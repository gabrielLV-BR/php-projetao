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

// impossível da query não retornar nada   echo "Horário de saída: $hr_saida<br>";

//   echo "HOráio de saída cu: " . date("Y-m-d H:i:s", $hr_saida) . "<br>";

//   $diff = ($hr_saida - $hr_entrada);

//   echo "Diff: $diff";

//   $_SESSION["Car"]["hr_entrada"] = $hr_entrada;
//   $_SESSION["Car"]["hr_saida"] = $hr_saida;
//   $_SESSION["Car"]["custo"] = $diff * 5.5;
$id = $veiculo[0]["id"];

// $res = $connection->query(
//   "SELECT * FROM entrada_saida e WHERE e.veiculo = :id AND hr_saida IS NULL ORDER BY hr_entrada DESC LIMIT 1;",
//   [ ":id" => $id ]
// );

$_SESSION["Car"] = $veiculo[0];

$time = date("Y-m-d H:i:s", $date->getTimestamp());

if(!isset($_SESSION["Cars"])) { $_SESSION["Cars"] = []; }

var_dump($_SESSION["Cars"]);
die();

if(isset($_SESSION["Cars"][$id])) {
  // Está no estacionamento e agora vai sair

  $hr_entrada = $_SESSION["Cars"][$id]["hr_entrada"];
  $hr_saida = $_SESSION["Cars"][$id]["hr_saida"];

  $preco = ($hr_saida - $hr_entrada) / 3600;
  
  $_SESSION["Car"]["hr_saida"] = $hr_saida;
  $_SESSION["Car"]["preco"] = $preco;
  
  //TODO Atualiza banco
  
  // Remove do estacionamento
  unset($_SESSION["Cars"][$id]);
} else {
  // Não está no estacionamento e agora vai entrar
  $_SESSION["Cars"][$id] = $veiculo[0];
  $_SESSION["Cars"][$id]["hr_entrada"] = $time;
}

header("Location: ../views/home.php");

// if(is_array($res) && count($res) == 0) {
//   // Se o veículo estiver entrando...
//   $connection->query(
//     "INSERT INTO entrada_saida (veiculo, hr_entrada) VALUES (:id, :time);",
//     [ ":id" => $id, ":time" => $time ]
//   );
// } else {
//   // Se estiver saindo...
//   // Atualiza o banco
//   $connection->query(
//     "UPDATE entrada_saida e SET hr_saida = :time WHERE e.veiculo = :id;",
//     [ ":id" => $id, ":time" => $time ]
//   );

//   // Pega horário de entrada
//   $hr_entrada = $connection->query(
//     "SELECT hr_entrada FROM entrada_saida WHERE veiculo = :id", [ "id" => $id ]
//   )[0]["hr_entrada"];

//   echo "Hr_entrada sem filtro: $hr_entrada<br>";

//   $hr_entrada = strtotime($hr_entrada);
//   $hr_saida = $date->getTimestamp() + $date->getOffset();

//   echo "Horário de entrada: $hr_entrada<br>";
//   echo "Horário de saída: $hr_saida<br>";

//   echo "HOráio de saída cu: " . date("Y-m-d H:i:s", $hr_saida) . "<br>";

//   $diff = ($hr_saida - $hr_entrada);

//   echo "Diff: $diff";

//   $_SESSION["Car"]["hr_entrada"] = $hr_entrada;
//   $_SESSION["Car"]["hr_saida"] = $hr_saida;
//   $_SESSION["Car"]["custo"] = $diff * 5.5;
// }


?>