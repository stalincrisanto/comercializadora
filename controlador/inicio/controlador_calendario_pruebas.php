<?php

    require '../../modelo/modelo_inicio.php';
    $MU = new ModeloInicio();
    $consulta = $MU->ListarPruebasCalendario();

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