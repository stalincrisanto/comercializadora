<?php

    require '../../modelo/comercializacion/productos.php';
    $MU = new ModeloProductos();
    $consulta = $MU->ListarProductosVenta();

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