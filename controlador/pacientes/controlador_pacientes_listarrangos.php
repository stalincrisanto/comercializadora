<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $dato = htmlspecialchars($_POST['dato'],ENT_QUOTES,'UTF-8');
    $fuerza = htmlspecialchars($_POST['fuerza'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->ListarRangos($dato,$fuerza);
    echo json_encode($consulta);
?>