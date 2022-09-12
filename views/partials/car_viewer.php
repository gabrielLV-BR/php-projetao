<?php 
  if(isset($_SESSION["Car"])) {
    $placa = $_SESSION["Car"]["placa"];
    $cor  = $_SESSION["Car"]["cor"];
    $modelo = $_SESSION["Car"]["modelo"];
    $fabricante = $_SESSION["Car"]["fabricante"];
?> 
  <div>
    <h1>Placa: <?= $placa ?></h1> 
    <h1>Modelo: <?= $modelo ?></h1> 
    <h1>Cor: <?= $cor ?></h1> 
    <h1>Fabricante: <?= $fabricante ?></h1> 

    <?php 
      if ( isset($_SESSION["Car"]["custo"]) ) { 
        $hr_entrada = date("H:i:s", $_SESSION["Car"]["hr_entrada"]);
        $hr_saida = date("H:i:s", $_SESSION["Car"]["hr_saida"]);
        $preco = $_SESSION["Car"]["custo"];
    ?>
      <hr>
      <h2>Horário de entrada: <?= $hr_entrada ?></h2>
      <h2>Horário de saída: <?= $hr_saida ?></h2>
      <h2>Total: <?= $preco ?></h2>
    <?php } ?>

  </div>
<?php

  unset($_SESSION["Car"]);
  }
?>
<script defer src="/public/js/error.js"></script>