<?php
include_once("../configure.php");
session_start();
?>

<?php require("./partials/header.php"); ?>

<!-- //TODO Estilizar -->
<h1>HOME</h1>
<h2>Seja bem-vindo, <?= $_SESSION["username"]; ?></h2>

<a href="../dao/logout.php">Logout</a>

<?php require("./partials/footer.php"); ?>