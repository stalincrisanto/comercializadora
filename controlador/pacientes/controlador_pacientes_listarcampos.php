<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $consulta = $MU->ListarDatos();
    echo json_encode($consulta);
?>