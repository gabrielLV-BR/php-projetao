<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <link rel="icon" href="/public/favicon.svg" sizes="any" type="image/svg+xml">

  <link rel="stylesheet" href="/public/css/global.css">
  <link rel="stylesheet" href="/public/css/header.css">
  <link rel="stylesheet" href="/public/css/footer.css">

  <title>Estacionamentos Porreta | Guardamos seu carro e etc.</title>
  <?php 
    if(isset($SCRIPTS))
      foreach($SCRIPTS as $src)       { echo "<script defer src='/public/js/$src'></script>"; }
    if(isset($STYLESHEETS))
      foreach($STYLESHEETS as $sheet) { echo "<link rel='stylesheet' href='/public/css/$sheet'>"; }
  ?>
</head>
<body>