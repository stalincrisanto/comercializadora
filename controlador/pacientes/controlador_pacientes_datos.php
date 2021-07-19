<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $paciente = htmlspecialchars($_POST['paciente'],ENT_QUOTES,'UTF-8');
    $profesion = htmlspecialchars($_POST['profesion'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->ListarDatosPacientes($paciente,$profesion);

    if($consulta)
    {
        echo json_encode($consulta);
    }
    else
    {
        echo'{
            "sEcho": 1,
		    "iTotalRecords": "0",
		    "iTotalDisplayRecords": "0",
		    "aaData": []
        }';
    }

?>