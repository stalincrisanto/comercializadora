<?php

    require '../../modelo/modelo_pacientes.php';
    $MU = new ModeloPacientes();
    $consulta = $MU->ListarPacientes();

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