<?php
function load_env()
{
  $env_file = file_get_contents(__DIR__ . "/../.env");
  $env_file = str_replace(" ", "", $env_file);
  $lines = explode("\n", $env_file);

  $_SESSION["Env"] = [];
  foreach ($lines as $line) {
    if (str_starts_with($line, "#")) continue;
    [$name, $val] = explode("=", $line);
    $_SESSION["Env"][$name] = $val;
  }
  $_SESSION["Configured"] = true;
}
