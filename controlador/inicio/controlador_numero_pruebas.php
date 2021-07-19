<?php

    require '../../modelo/modelo_inicio.php';
    $MU = new ModeloInicio();
    $consulta = $MU->NumeroPruebas();

    echo $consulta;
?>