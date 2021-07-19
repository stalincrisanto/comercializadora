<?php

    require '../../modelo/modelo_pruebas.php';
    $MU = new ModeloPruebas();
    $idPaciente = $_POST['idPaciente'];
    $consulta = $MU->ListarPruebasPorPaciente($idPaciente);

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