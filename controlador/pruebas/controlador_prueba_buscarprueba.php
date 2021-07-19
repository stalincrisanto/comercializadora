<?php
    require '../../modelo/modelo_pruebas.php';

    $MU = new ModeloPruebas();
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $tipo_prueba = htmlspecialchars($_POST['tipo_prueba'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->BuscarPrueba($paciente,$tipo_prueba);
    $data = json_encode($consulta);
    echo json_encode($consulta);
?>