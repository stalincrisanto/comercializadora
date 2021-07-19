<?php
    require '../../modelo/modelo_pruebas.php';

    $MU = new ModeloPruebas();
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $evaluador = htmlspecialchars($_POST['evaluador'],ENT_QUOTES,'UTF-8');
    $fecha = htmlspecialchars($_POST['fecha'],ENT_QUOTES,'UTF-8');
    $hora = htmlspecialchars($_POST['hora'],ENT_QUOTES,'UTF-8');
    $tipo_prueba = htmlspecialchars($_POST['tipo_prueba'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->RegistrarPrueba($paciente,$evaluador,$fecha,$hora,$tipo_prueba);
    $data = json_encode($consulta);
    echo $consulta;
?>