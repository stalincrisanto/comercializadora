<?php

    require '../../modelo/modelo_pruebas.php';
    $MU = new ModeloPruebas();
    $tipoPrueba = htmlspecialchars($_POST['tipoPrueba'],ENT_QUOTES,'UTF-8');
    $consulta = $MU->ListarPruebas($tipoPrueba);

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