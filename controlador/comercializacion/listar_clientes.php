<?php

    require '../../modelo/comercializacion/ventas.php';
    $MU = new ModeloVentas();
    $consulta = $MU->ListarClientes();

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