<?php

if (isset($_GET['veiticinco'])) {
    sleep(2); // I used sleep() to simulate processing
    echo '$("#barra_de_progreso").barra_de_progreso({ value: 25 });';
    }
if (isset($_GET['cincuenta'])) {
    sleep(2);
    echo '$("#barra_de_progreso").barra_de_progreso({ value: 50 });';
    }
if (isset($_GET['setentaycinco'])) {
    sleep(2);
    echo '$("#barra_de_progreso").barra_de_progreso({ value: 75 });';
    }
if (isset($_GET['cien'])) {
    sleep(2);
    echo '$("#barra_de_progreso").barra_de_progreso({ value: 100 });';
    }

?>