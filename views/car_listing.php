<?php 
    if(session_status() != PHP_SESSION_ACTIVE) session_start();
    require_once("../verify.php");
    require_once("../dao/vehicle.php");
    
    $saidas = get_saidas();
    $estadias = get_estadias();

    $STYLESHEETS = array("history.css");

    function get_car_html($car, $status) {
        $placa = $car["placa"];
        $modelo = $car["modelo"];
        ?> 
        <li>
            <p class="placa"><small>placa</small><?= $placa ?></p>
            <p class="modelo"><small>modelo</small><?= $modelo ?></p>

            <p class="entrada"><small>entrada</small><?= date(MYSQL_TIME, $car["hr_entrada"]) ?></p>
            <?php if(isset($car["hr_saida"])): ?>
                <p class="saida"><small>saída</small><?= date(MYSQL_TIME, $car["hr_saida"]) ?></p>
            <?php endif; ?>
            <hr>
            <p class="status"><small>Status</small> <?= $status ?></p>
        </li>
        <?php
    }
?>
<?php include("./components/header.php") ?>

<main class="container">
    <h1>Listagem de carros</h1>
    <h2>Dentro do estacionamento</h2>
    <ul>
    <?php 
        if(count($estadias) > 0) {
            foreach($estadias as $id => $carro) {
               get_car_html($carro, "Dentro do estacionamento");
            }
        } else {
            echo "<h2>Vazio</h2>";
        }
    ?>
    </ul>
    <hr>
    <h2>Fora do estacionamento</h2>
    <ul>
    <?php 
        if(count($saidas) > 0) {
            foreach($saidas as $id => $carro) {
                get_car_html($carro, "Fora do estacionamento");
            }
        } else {
            echo "<h2>Vazio</h2>";
        }
    ?>
    </ul>
    <hr>
</main>


<?php include("./components/footer.php") ?>