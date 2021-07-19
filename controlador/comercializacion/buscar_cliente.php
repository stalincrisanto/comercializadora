<?php
    require '../../modelo/comercializacion/ventas.php';

    $MU = new ModeloVentas();

    $id_cliente = htmlspecialchars($_POST['id_cliente'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->BuscarCliente($id_cliente);
    $data = json_encode($consulta);
    if(count($consulta)>0)
    {
        echo $data;
    }
    else 
    {
        echo 0;
    }
?>