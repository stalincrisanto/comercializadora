<?php
    require '../../modelo/modelo_pacientes.php';

    $MU = new ModeloPacientes();

    $id_paciente = htmlspecialchars($_POST['id_paciente'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->EliminarPaciente($id_paciente);
    $data = json_encode($consulta);
    echo $consulta;
?>