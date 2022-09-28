<?php 
  if(session_status() != PHP_SESSION_ACTIVE) session_start();
  require_once("../db/connection.php");

  define("MYSQL_TIME", "Y-m-d H:i:s");

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

  function get_vehicle_by_id(string $id) {
    $con = new SQLConnection();

    $veiculo = $con->query(
      "SELECT * FROM veiculos WHERE id = :id;",
      [ ":id" => $id ]
    );

    if(is_array($veiculo) && count($veiculo) == 0) {
      return null;
    }

    return $veiculo[0];
  }

  function get_estadias() {
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("UCT"));

    if(!isset($_SESSION["Cars"]) || count($_SESSION["Cars"]) == 0) 
      return [];

    $estadias = [];
    foreach($_SESSION["Cars"] as $id => $car) {
      $veiculo = get_vehicle_by_id($id);
      if(is_array($veiculo) && is_array($car)) {
        $estadias[] = array(...$veiculo, ...$car);
      }
    }

    return $estadias;
  }

  function get_saidas() {
    $con = new SQLConnection();

    $saidas = $con->query("SELECT * FROM entrada_saida e, veiculos v WHERE e.veiculo = v.id ORDER BY hr_entrada;");
    $resultados = [];
    foreach ($saidas as $id => $car) {
      $car["hr_saida"] = strtotime($car["hr_saida"]);
      $car["hr_entrada"] = strtotime($car["hr_entrada"]);
      $resultados[] = $car;
    }

    return $resultados;
  }

  function register_vehicle(string $placa, string $fabricante, string $modelo, string $cor) {
    $con = new SQLConnection();

    $res = $con->query(
      "INSERT INTO veiculos (placa, fabricante, modelo, cor) VALUES (:placa, :fabricante, :modelo, :cor);",
      [ ":placa"  => $placa , ":fabricante" => $fabricante,
        ":modelo" => $modelo, ":cor" => $cor ]
    );

    return is_array($res) && count($res) == 0;
  }

  function registrar_saida($veiculo, $hr_entrada, $hr_saida) {
    $con = new SQLConnection();

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("UCT"));

    $date->setTimestamp($hr_entrada);
    $hr_entrada = $date->format(MYSQL_TIME);

    $date->setTimestamp($hr_saida);
    $hr_saida = $date->format(MYSQL_TIME);

    $res = $con->query(
      "INSERT INTO entrada_saida (veiculo, hr_entrada, hr_saida) VALUES (:veiculo, :hr_entrada, :hr_saida);",
      [ ":veiculo" =>  $veiculo, ":hr_entrada" => $hr_entrada, ":hr_saida" => $hr_saida ]
    );

    return is_array($res) && count($res) == 0;
  }

  function car_in($veiculo) {
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("UCT"));

    $id = $veiculo["id"];

    $_SESSION["Cars"][$id] = $veiculo;
    
    $timestamp = $date->getTimestamp();

    $_SESSION["Cars"][$id]["hr_entrada"] = $timestamp;
    $_SESSION["Car"]["hr_entrada"] = $timestamp;
  }

  function car_out($veiculo) {
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("UCT"));

    $id = $veiculo["id"];

    $hr_entrada = $_SESSION["Cars"][$id]["hr_entrada"];
    $hr_saida = $date->getTimestamp();
  
    $preco = ($hr_saida - $hr_entrada) / 3600;
    
    $_SESSION["Car"]["hr_entrada"] = $hr_entrada;
    $_SESSION["Car"]["hr_saida"] = $hr_saida;
    $_SESSION["Car"]["preco"] = $preco;
    
    // Remove do estacionamento
    unset($_SESSION["Cars"][$id]);

    //TODO Atualiza banco
    registrar_saida($id, $hr_entrada, $hr_saida);
  }

?>