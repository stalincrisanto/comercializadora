<?php

    require '../../modelo/modelo_pruebas.php';
    $MU = new ModeloPruebas();
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $consulta = $MU->ListarPruebasPorFechas($fecha_inicio,$fecha_fin);

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