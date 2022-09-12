<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

if(
  !isset($_POST["placa"]) ||
  !isset($_POST["fabricante"]) ||
  !isset($_POST["modelo"]) ||
  !isset($_POST["cor"])
) {
  error_out("Placa, Fabricante, Modelo e Cor dever ser informados");
  die();
}

$placa = $_POST["placa"];
$fabricante = $_POST["fabricante"];
$modelo = $_POST["modelo"];
$cor = $_POST["cor"];

$connection = new SQLConnection();

$res = [];
try {
  $res = $connection->query(
    "SELECT * FROM veiculos WHERE placa = :placa;",
    [ ":placa"  => $placa ]
  );
} catch (Exception $e) {
  error_out("Erro na conexão com o banco de dados");
}

if(is_array($res) && count($res) > 0) {
  error_out("Placa já cadastrada");
  die();
}

try {
  $res = $connection->query(
    "INSERT INTO veiculos (placa, fabricante, modelo, cor) VALUES (:placa, :fabricante, :modelo, :cor);",
    [ ":placa"  => $placa , ":fabricante" => $fabricante,
      ":modelo" => $modelo, ":cor" => $cor ]
  );
} catch (Exception $e) {
error_out("Erro na conexão com o banco de dados");
}

if (is_array($res)) {
  message_out("Veículo registrado com sucesso", "./car_entry.php");
} else {
  error_out("Erro ao registrar veículo", "../views/home.php");
}
die();
?>