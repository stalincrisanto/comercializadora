<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $consulta = $MU->ListarDatosUnidad();
    echo json_encode($consulta);
?>