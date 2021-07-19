<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $rango1 = htmlspecialchars($_POST['rango1'],ENT_QUOTES,'UTF-8');
    $fuerza = htmlspecialchars($_POST['fuerza'],ENT_QUOTES,'UTF-8');
    $rango2 = htmlspecialchars($_POST['rango2'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->ListarRangosFinal($rango1,$fuerza,$rango2);
    echo json_encode($consulta);
?>