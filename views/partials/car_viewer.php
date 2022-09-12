<?php 
  if(isset($_SESSION["Car"])) {
    print_r($_SESSION["Car"]);
    $placa = $_SESSION["Car"]["placa"];
    $cor  = $_SESSION["Car"]["cor"];
    $modelo = $_SESSION["Car"]["modelo"];
    $fabricante = $_SESSION["Car"]["fabricante"];

?> 
  <h1>Oi carro da placa <?= $placa ?></h1>    
<?php
    unset($_SESSION["Car"]);
  }
?>
<script defer src="/public/js/error.js"></script>