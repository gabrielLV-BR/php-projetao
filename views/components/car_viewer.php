<?php
if (isset($_SESSION["Car"])) {
  $placa = $_SESSION["Car"]["placa"];
  $cor  = $_SESSION["Car"]["cor"];
  $modelo = $_SESSION["Car"]["modelo"];
  $fabricante = $_SESSION["Car"]["fabricante"];
?>
  <div class="car-viewer">
    <span class="left">
      <label for="placa">Placa:</label>
      <p id="placa"><?= $placa ?></p>

      <label for="modelo">Modelo:</label>
      <p id="modelo"><?= $modelo ?></p>

      <label for="cor">Cor:</label>
      <p id="cor"><?= $cor ?></p>

      <label for="fabricante">Fabricante</label>
      <p id="fabricante"><?= $fabricante ?></p>
    </span>
    <span class="right">
      <?php
        $hr_entrada = date("H:i:s", $_SESSION["Car"]["hr_entrada"]);
      ?>
      <label for="entrada">Horário de Entrada</label>
      <p id="entrada"><?= $hr_entrada ?></p>

      <img src="data:image/jpeg;base64,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" alt="">
      <?php
      if (isset($_SESSION["Car"]["hr_saida"])) {
        $hr_saida = date("H:i:s", $_SESSION["Car"]["hr_saida"]);
        $preco = $_SESSION["Car"]["preco"];
      ?>
        <label for="saida">Horário de Saída</label>
        <p id="saida"><?= $hr_saida ?></p>

        <label for="preco">Preço</label>
        <p id="preco">R$ <?= number_format($preco, 2, ',', '.'); ?></p>
      <?php } ?>
    </span>

  </div>
<?php

  unset($_SESSION["Car"]);
}
?>
<script defer src="/public/js/error.js"></script>