<?php

    require '../../modelo/modelo_usuario.php';
    $MU = new ModeloUsuario();
    $consulta = $MU->ListarUsuarios();

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