<?php
    require '../../modelo/comercializacion/productos.php';

    $MU = new ModeloProductos();
    $codigo_producto = htmlspecialchars($_POST['codigo_producto'],ENT_QUOTES,'UTF-8');
    $nombre_producto = htmlspecialchars($_POST['nombre_producto'],ENT_QUOTES,'UTF-8');
    $precio_producto = htmlspecialchars($_POST['precio_producto'],ENT_QUOTES,'UTF-8');
    $imagen_producto_input = htmlspecialchars($_POST['imagen_producto_input'],ENT_QUOTES,'UTF-8');
    $descripcion_producto = htmlspecialchars($_POST['descripcion_producto'],ENT_QUOTES,'UTF-8');
    //$stock_producto = htmlspecialchars($_POST['stock_producto'],ENT_QUOTES,'UTF-8');
    //$categoria_producto = htmlspecialchars($_POST['categoria_producto'],ENT_QUOTES,'UTF-8');
    $marca_producto = htmlspecialchars($_POST['marca_producto'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->RegistrarProducto($codigo_producto,$nombre_producto,$precio_producto,$imagen_producto_input,
                                       $descripcion_producto,$marca_producto);
    $data = json_encode($consulta);
    echo $consulta;
    
?>