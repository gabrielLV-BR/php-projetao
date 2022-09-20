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

      <label for="color">Cor:</label>
      <p id="color"><?= $cor; ?></p>

      <label for="fabricante">Fabricante</label>
      <p id="fabricante"><?= $fabricante ?></p>
    </span>
    <span class="right">
      <?php
      $hr_entrada = date("H:i:s", $_SESSION["Car"]["hr_entrada"]);
      ?>
      <label for="entrada">Horário de Entrada</label>
      <p id="entrada"><?= $hr_entrada ?></p>

      <div class="car">
        <svg version="1.2" viewBox="0 0 167.99 82.947" xmlns="http://www.w3.org/2000/svg" xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g transform="translate(-41.492 -59.733)">
            <path id="Corpo" class="s1" d="m42 126 1-16s3.8-14.3 12-16l20-10h2s26.3-17 37-17c0 0 23.4-3.4 51-1 0 0 20.732-0.78605 38.529 11.667 0.15727 0.11004 0.3143 0.22111 0.47109 0.33323 0 0 2.2 5 2 9l1 6s5.1 8.5-1 19l-3 1s-0.52322 7.8113-4.9 9.7c-3.6339-3e-3 -11.786 0.9985-13.225-3.6219l-50.875 11.922-3-2s-2.3389 11.728-10.039 12.428c0 0-10.361 3.4722-16.961-4.4278 0 0-9.5 6.7-40.3-1.9 0 0-20.7-7.2-21.7-9.1z" style="stroke:#000" />
          </g>
        </svg>
        
        <svg version="1.2" viewBox="0 0 167.99 82.947" xmlns="http://www.w3.org/2000/svg" xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns:xlink="http://www.w3.org/1999/xlink">
          <g transform="translate(-41.492 -59.733)">
            <path class="s0" d="m49 99s2.4-5.1 8-6c0 0-6.7 3.6-8 6z" style="stroke:#000" />
            <path d="m76 112s6-15.2 32-13c0 0 2.1 1.9 0 3l-11 8s-2.2 0.5-4.5 0.8c-2.4 0.3-16.5 1.2-16.5 1.2z" style="fill:#737373;stroke:#000" />
            <path class="s1" d="m110.7 68.1c7.3 1.9 36.7 2.4 34.3 2.9q-0.3 0.1-0.8 0.4c-4.6 2.5-23.6 16.9-23.6 16.9-36.8 2.4-43.7-4.3-43.7-4.3 21-12.9 33.8-15.9 33.8-15.9z" style="fill:#393939;stroke:#000" />
            <path class="s1" d="m140.06 91.232s-1.5552-5.232 2.9448-6.232c0 0 9.4 0 9 4 0 0-0.2 4.6-8.9 3.4z" style="fill:none;stroke:#000" />
            <path class="s1" d="m44 124s16.2 11.9 42.8 8.4" style="fill:none;stroke:#000" />
          <path d="m151.79 89.881c19.414-3.748 40.713-8.0808 40.713-8.0808l0.5-5.8c-37.9-25.6-70 19-70 19 0.47414 0.03647 13.212-3.1293 17.167-3.8337 0 0-1.5737-4.9698 2.7794-6.1188 0 0 4.8834-0.7955 8.2422 2.6517 0.83968 1.591 0.59828 2.1816 0.59828 2.1816z" style="fill:#393939;stroke:#000" />
          <path class="s1" d="m98.667 98.894s18.844-6.9222 19.644-10.322" style="fill:none;stroke:#000" />
          <path class="s1" d="m51.494 96.728s8.7716 7.205 31.76 7.3272" style="fill:none;stroke:#000" />
          <path class="s1" d="m206 88c-6.4-4.3-2.9116-10.323-2.9116-10.323 2.2221-0.39177 2.9116 10.323 2.9116 10.323z" style="fill:#a00;stroke:#000" />
          <path class="s1" d="m203.78 112.66c2.2-16.6-4.405-14.41-4.405-14.41-10.386 2.8183-8.6109 19.638-8.6109 19.638l-5.4907 1.0808s2.2783 3.6675 10.325 3.4353c0 0 4.7317 0.8619 7.5266-9.4665z" style="fill:#000;stroke:#000" />
          <ellipse cx="90.282" cy="103.57" rx="2.4851" ry="2.6101" style="fill:#d7d7d7" />
          <path class="s0" d="m109.87 115.67c3.3-8.5 18.174-6.9281 18.174-6.9281 3.9616 1.8593 6.1643 4.3479 5.6359 11.249-0.54191 7.0773-0.34148 10.462-0.34148 10.462l-2.3389-1.4556c-3.4 10.1-10 12-10 12-12.5 3.4-16.33-4.0275-16.33-4.0275-2-10.2 5.2-21.3 5.2-21.3z" style="fill:#000;stroke:#000" />
          <path class="s0" d="m164.29 65.884 3.7071-5.8839" style="stroke:#000" />
          <path d="m142.84 92.634s-4.773 8.5295-5.2149 0.17678l1.9446-1.37s1.591 0.70711 3.2704 1.1932z" style="stroke-width:1px;stroke:#000" />
          <ellipse cx="95.772" cy="105.1" rx="4.8601" ry="4.5163" style="fill:#d7d7d7" />
        </g>
      </svg>
      
      <svg version="1.2" viewBox="0 0 167.99 82.947" xmlns="http://www.w3.org/2000/svg" xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g>
          <path d="m34.572 52.231s6-15.2 32-13c0 0 2.1 1.9 0 3l-11 8s-2.2 0.5-4.5 0.8c-2.4 0.3-16.5 1.2-16.5 1.2z" style="fill:none;stroke:#000" />
        </g>
      </svg>
    </div>
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
  echo "<script>
    var color = '$cor';
  </script>
  ";
}
?>
<script defer src="/public/js/car_viewer.js"></script>