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

<svg xmlns:osb="http://www.openswatchbook.org/uri/2009/osb" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg3821" height="82.947" width="167.989" version="1.2"><defs id="defs3797"><linearGradient id="linearGradient6304-3"><stop id="stop6300" offset="0" style="stop-color:#000;stop-opacity:1"/><stop id="stop6302" offset="1" style="stop-color:#000;stop-opacity:0"/></linearGradient><linearGradient osb:paint="gradient" gradientUnits="userSpaceOnUse" y2="127.5" x2="130.1" y1="127.5" x1="110" id="g1"><stop id="stop3792" stop-color="#000" offset="0"/><stop id="stop3794" stop-color="#fff" offset="1"/></linearGradient><linearGradient gradientUnits="userSpaceOnUse" y2="135.059" x2="119.558" y1="144.47" x1="101.404" id="linearGradient6306" xlink:href="#linearGradient6304-3"/></defs><style id="style3799">.s0,.s1{fill:#000;stroke:#000}.s1{fill:none}</style><use transform="translate(-41.492 -59.733)" height="100%" width="100%" y="0" x="0" href="#img1" id="Background"/><g transform="translate(-41.492 -59.733)" style="display:inline;opacity:1" id="layer2"><g id="Traçado"><path style="stroke:#000" d="M49 99s2.4-5.1 8-6c0 0-6.7 3.6-8 6z" class="s0" id="Forma 1"/><path style="stroke:#000" d="M76 112s6-15.2 32-13c0 0 2.1 1.9 0 3l-11 8s-2.2.5-4.5.8c-2.4.3-16.5 1.2-16.5 1.2z" class="s1" id="Forma 2"/><path style="stroke:#000" d="M110.7 68.1C118 70 147.4 70.5 145 71q-.3.1-.8.4c-4.6 2.5-23.6 16.9-23.6 16.9C83.8 90.7 76.9 84 76.9 84c21-12.9 33.8-15.9 33.8-15.9z" class="s1" id="Forma 3"/><path style="stroke:#000" d="M140.055 91.232S138.5 86 143 85c0 0 9.4 0 9 4 0 0-.2 4.6-8.9 3.4z" class="s1" id="Forma 4"/><path style="stroke:#000" d="M44 124s16.2 11.9 42.8 8.4" class="s1" id="Forma 8"/><path id="path6662" d="M140.167 91.166c-3.955.705-16.693 3.87-17.167 3.834 0 0 32.1-44.6 70-19l-.5 5.8s-21.3 4.333-40.713 8.08" style="stroke:#000"/><path style="stroke:#000" d="M98.667 98.894s18.844-6.922 19.644-10.322" class="s1" id="Forma 7"/><path style="stroke:#000" d="M51.494 96.728s8.772 7.205 31.76 7.327" class="s1" id="Forma 6"/></g><path id="carro" style="stroke:red" d="m42 126 1-16s3.8-14.3 12-16l20-10h2s26.3-17 37-17c0 0 23.4-3.4 51-1 0 0 20.732-.786 38.529 11.667.157.11.314.22.471.333 0 0 2.2 5 2 9l1 6s5.1 8.5-1 19l-3 1s-.523 7.811-4.9 9.7c-3.634-.003-11.786.999-13.225-3.622L134 131l-3-2s-2.339 11.728-10.039 12.428c0 0-10.361 3.472-16.961-4.428 0 0-9.5 6.7-40.3-1.9 0 0-20.7-7.2-21.7-9.1z" class="s1" id="Corpo" /></g><g transform="translate(-41.492 -59.733)" id="g6715" style="display:inline;opacity:1"><g id="g6703"><path id="path6683" class="s0" d="M49 99s2.4-5.1 8-6c0 0-6.7 3.6-8 6z" style="fill:#000;stroke:#000"/><path id="path6685" d="M76 112s6-15.2 32-13c0 0 2.1 1.9 0 3l-11 8s-2.2.5-4.5.8c-2.4.3-16.5 1.2-16.5 1.2z" style="fill:#737373;fill-opacity:1;stroke:#000"/><path id="path6687" class="s1" d="M110.7 68.1C118 70 147.4 70.5 145 71q-.3.1-.8.4c-4.6 2.5-23.6 16.9-23.6 16.9C83.8 90.7 76.9 84 76.9 84c21-12.9 33.8-15.9 33.8-15.9z" style="fill:#393939;fill-opacity:1;stroke:#000"/><path id="path6689" class="s1" d="M140.055 91.232S138.5 86 143 85c0 0 9.4 0 9 4 0 0-.2 4.6-8.9 3.4z" style="fill:var(--color, white)"/><path id="path6691" class="s1" d="M44 124s16.2 11.9 42.8 8.4" style="fill:none;stroke:#000"/><path style="fill:#393939;fill-opacity:1;stroke:#000" d="M151.787 89.88C171.2 86.134 192.5 81.8 192.5 81.8l.5-5.8c-37.9-25.6-70 19-70 19 .474.036 13.212-3.13 17.167-3.834 0 0-1.574-4.97 2.78-6.118 0 0 4.883-.796 8.241 2.651.84 1.591.599 2.182.599 2.182z" id="path6693"/><path id="path6695" class="s1" d="M98.667 98.894s18.844-6.922 19.644-10.322" style="fill:none;stroke:#000"/><path id="path6697" class="s1" d="M51.494 96.728s8.772 7.205 31.76 7.327" style="fill:none;stroke:#000"/><path id="path6699" class="s1" d="M206 88c-6.4-4.3-2.912-10.323-2.912-10.323C205.31 77.285 206 88 206 88z" style="fill:#a00;stroke:#000"/><path id="path6701" class="s1" d="M203.78 112.66c2.2-16.6-4.405-14.41-4.405-14.41-10.386 2.818-8.61 19.638-8.61 19.638l-5.492 1.08s2.279 3.668 10.325 3.436c0 0 4.732.862 7.527-9.466z" style="fill:#000;fill-opacity:1;stroke:#000"/></g><ellipse ry="2.61" rx="2.485" cy="103.574" cx="90.282" id="path6735" style="opacity:1;fill:#d7d7d7;fill-opacity:1;stroke:none;stroke-width:.61964852;stroke-opacity:1"/><g id="g6707" style="fill:url(#linearGradient6306);fill-opacity:1"><path id="path6705" class="s0" d="M109.87 115.672c3.3-8.5 18.174-6.928 18.174-6.928 3.962 1.86 6.165 4.348 5.636 11.25-.542 7.076-.341 10.462-.341 10.462L131 129c-3.4 10.1-10 12-10 12-12.5 3.4-16.33-4.027-16.33-4.027-2-10.2 5.2-21.3 5.2-21.3z" style="fill:#000;fill-opacity:1;stroke:#000"/></g><path style="fill:#000;stroke:#000" id="path6709" class="s0" d="M164.293 65.884 168 60"/><path style="fill:#000;fill-opacity:1;stroke:#000;stroke-width:1px;stroke-linecap:butt;stroke-linejoin:miter;stroke-opacity:1" d="M142.843 92.634s-4.773 8.53-5.215.177l1.945-1.37s1.59.707 3.27 1.193z" id="path6713"/><ellipse ry="4.516" rx="4.86" cy="105.097" cx="95.772" id="path6735-3" style="display:inline;opacity:1;fill:#d7d7d7;fill-opacity:1;stroke:none;stroke-width:1.13989425;stroke-opacity:1"/></g><g id="layer5"><path id="path6685-0" d="M34.572 52.231s6-15.2 32-13c0 0 2.1 1.9 0 3l-11 8s-2.2.5-4.5.8c-2.4.3-16.5 1.2-16.5 1.2z" style="display:inline;opacity:1;fill:none;fill-opacity:1;stroke:#000"/></g></svg>

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