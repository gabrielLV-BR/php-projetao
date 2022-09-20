<?php 
  session_start();
  require_once("../db/connection.php");

  $date = new DateTime();
  $date->setTimezone(new DateTimeZone("UCT"));

  function get_vehicle(string $placa) {
    $con = new SQLConnection();

    $veiculo = $con->query(
      "SELECT * FROM veiculos WHERE placa = :placa;",
      [ ":placa" => $placa ]
    );

    if(is_array($veiculo) && count($veiculo) == 0) {
      return null;
    }

    return $veiculo[0];
  }

  function car_in($veiculo) {
    global $date;
    $id = $veiculo["id"];

    $_SESSION["Cars"][$id] = $veiculo;
    $_SESSION["Cars"][$id]["hr_entrada"] = $date->getTimestamp();
  }

  function car_out($veiculo) {
    global $date;
    $id = $veiculo["id"];

    $hr_entrada = $_SESSION["Cars"][$id]["hr_entrada"];
    $hr_saida = $date->getTimestamp();
  
    $preco = ($hr_saida - $hr_entrada) / 3600;
    
    $_SESSION["Car"]["hr_saida"] = $hr_saida;
    $_SESSION["Car"]["preco"] = $preco;
    
    //TODO Atualiza banco
    
    // Remove do estacionamento
    unset($_SESSION["Cars"][$id]);
    // echo "issset(\$_SESSION[\"Cars\"][\$id]) -> " . isset($_SESSION["Cars"][$id]) . "<br>";
    // die();
  }

?>