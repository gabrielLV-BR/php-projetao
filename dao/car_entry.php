<?php 
session_start();
require_once("../utils/message.php");
require_once("../db/connection.php");

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
  error_out("Erro na conexão com o banco de dados");
  die();
});

$res = $connection->query(
  "SELECT * FROM veiculos WHERE placa = :placa;",
  [ ":placa" => $placa ]
);

if(is_array($res) && count($res) == 0) {
  // Veículo não cadastrado
  header("Location: ../views/car_register.php");
  die();
}

// impossível da query não retornar nada
$id = $res[0]["id"];
echo $id;

$res = $connection->query(
  "SELECT * FROM entrada_saida e WHERE e.veiculo = :id AND hr_saida IS NULL ORDER BY hr_entrada LIMIT 1;",
  [ ":id" => $placa ]
);

//TODO Mostrar informações do veículo na página HOME
if(is_array($res) && count($res) == 0) {
  // Se o veículo estiver entrando...
  $connection->query(
    "INSERT INTO entrada_saida (veiculo, hr_entrada) VALUES (:id, now());",
    [ ":id" => $id ]
  );


} else {
  // Se estiver saindo...
  $res = $connection->query(
    "UPDATE entrada_saida e SET hr_saida = now() WHERE e.veiculo = :id;",
    [ ":id" => $id]
  );
}

?>