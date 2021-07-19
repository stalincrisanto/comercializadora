<?php

    require '../../modelo/modelo_pruebas.php';
    $MU = new ModeloPruebas();
    $idTipoPrueba = $_POST['idTipoPrueba'];
    $consulta = $MU->ListarPruebasPorTipoPrueba($idTipoPrueba);

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