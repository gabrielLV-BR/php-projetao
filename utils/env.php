<?php
// Carrega as variáveis de ambiente
function load_env()
{
  // Lê conteúdo dos arquivos
  $env_file = file_get_contents(__DIR__ . "/../.env");
  // Troca retira os espaços inúteis
  $env_file = str_replace(" ", "", $env_file);
  // Pega cada linha
  $lines = explode("\n", $env_file);

  // Cria sessão vazia
  $_SESSION["Env"] = [];
  // Vai por cada linha
  foreach ($lines as $line) {
    // Ignora comentários que começam com #
    if (str_starts_with($line, "#")) continue;
    [$name, $val] = explode("=", $line);
    // Guarda variável na sessão
    $_SESSION["Env"][$name] = $val;
  }

  // Guarda variável que mostra que tá configurado
  $_SESSION["Configured"] = true;
}
