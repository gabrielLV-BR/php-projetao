<?php
include_once("../configure.php");
session_start();
?>

<?php require("./partials/header.php"); ?>

<h1>HOME</h1>
<h2>Seja bem-vindo, <?= $_SESSION["username"]; ?></h2>

<?php require("./partials/footer.php"); ?>