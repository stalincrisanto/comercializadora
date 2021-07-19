<?php

    require '../../modelo/modelo_pruebas.php';
    $MU = new ModeloPruebas();
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