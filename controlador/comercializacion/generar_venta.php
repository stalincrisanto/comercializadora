<?php
    require '../../modelo/comercializacion/ventas.php';

    $MU = new ModeloVentas();
    $id_cliente = htmlspecialchars($_POST['id_cliente'],ENT_QUOTES,'UTF-8');
    $id_vendedor = htmlspecialchars($_POST['id_vendedor'],ENT_QUOTES,'UTF-8');
    $forma_pago = htmlspecialchars($_POST['forma_pago'],ENT_QUOTES,'UTF-8');
    $total_venta = htmlspecialchars($_POST['total_venta'],ENT_QUOTES,'UTF-8');
    $descuento_venta = htmlspecialchars($_POST['descuento_venta'],ENT_QUOTES,'UTF-8');
    $total_final_venta = htmlspecialchars($_POST['total_final_venta'],ENT_QUOTES,'UTF-8');
    $detalle = $_POST['detalle'];
    $arreglo_detalle = json_decode($detalle, true);
    
    
    $consulta = $MU->RegistrarVenta($id_cliente,$total_venta,$arreglo_detalle,$id_vendedor,$forma_pago,$descuento_venta,$total_final_venta);
    $data = json_encode($consulta);
    echo $consulta;
?>