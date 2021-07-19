<?php

    require '../../modelo/comercializacion/productos.php';
    $MU = new ModeloProductos();

    $id_producto = $_POST['id_producto'];
    
    $consulta = $MU->DetalleProducto($id_producto);
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