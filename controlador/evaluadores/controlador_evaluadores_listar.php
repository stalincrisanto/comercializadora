<?php

    require '../../modelo/modelo_evaluadores.php';
    $MU = new ModeloEvaluadores();
    $consulta = $MU->ListarEvaluadores();

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