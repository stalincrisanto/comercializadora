<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    require_once '../../../conexionreportes/conexion_reportes.php';
    $cuerpo  = '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Example 1</title>
            <link rel="stylesheet" href="style.css" media="all" />
        </head>
        <body>
            <header class="clearfix">
                <h1>COMERCIALIZADORA</h1>
                <h2>Factura emitida</h2>
            </header>
            <main>
                <h3>Datos personales del Cliente</h3>
    ';
    $consulta = "SELECT cabecera_factura.FECHA_EMISION, cliente.CEDULA_CLIENTE, 
    concat_ws(' ', cliente.NOMBRE_CLIENTE,cliente.APELLIDO_CLIENTE) AS NOMBRES, 
    cliente.DIRECCION_CLIENTE, cliente.TELEFONO_CLIENTE, forma_pago.NOMBRE_FORMAPAGO 
    FROM cabecera_factura 
    INNER JOIN forma_pago ON forma_pago.ID_FORMAPAGO = cabecera_factura.ID_FORMAPAGO 
    INNER JOIN cliente ON cliente.ID_CLIENTE = cabecera_factura.ID_CLIENTE 
    WHERE cabecera_factura.ID_CABECERA = '".$_GET['id_cabecera']."'";

    $resultado = $mysqli->query($consulta);
    while($row= $resultado->fetch_assoc())
    {
        $cuerpo .= "
        <table>
            <thead>
                <tr>
                    <th class=desc>Fecha de compra</th>
                    <th class=desc>Nombres y Apellidos</th>
                    <th class=service>Cédula de identidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>                
                    <td class=service>" . $row['FECHA_EMISION'] . "</td>
                    <td class=desc>" . $row['NOMBRES'] . "</td>
                    <td class=service>" . $row['CEDULA_CLIENTE'] . "</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class=service>Dirección</th>
                    <th class=service>Teléfono</th>
                    <th class=service>Forma de pago</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['DIRECCION_CLIENTE'] . "</td>
                    <td class=service>" . $row['TELEFONO_CLIENTE'] . "</td>
                    <td class=service>" . $row['NOMBRE_FORMAPAGO'] . "</td>
                </tr>
            </tbody>
        </table><hr>
    ";
    }

    $cuerpo .= "
    <table>
    <thead>
      <tr>
        <th class=service>PRODUCTO</th>
        <th class=service>CANTIDAD</th>
        <th class=service>PRECIO</th>
        <th class=service>TOTAL</th>
      </tr>
    </thead>
    </table>
    ";

    $consulta_detalle="SELECT detalle_factura.CANTIDAD, producto.NOMBRE_PRODUCTO, 
    detalle_factura.TOTAL,producto.PRECIO_PRODUCTO FROM detalle_factura 
    INNER JOIN producto ON producto.ID_PRODUCTO = detalle_factura.ID_PRODUCTO 
    WHERE detalle_factura.ID_CABECERA ='".$_GET['id_cabecera']."'";
    
    $resultado2 = $mysqli->query($consulta_detalle);
    while($row2= $resultado2->fetch_assoc())
    {
        $cuerpo .= "
        <table>
        <tbody>
          <tr>
            <td class=service>". $row2['NOMBRE_PRODUCTO'] . "</td>  
            <td class=service>". $row2['CANTIDAD'] . "</td>
            <td class=service>". $row2['PRECIO_PRODUCTO'] . "</td>
            <td class=service>". $row2['TOTAL'] . "</td>
          </tr>
        </tbody>
      </table>
        ";
    }

    $consulta_total="SELECT cabecera_factura.TOTAL_FACTURA, cabecera_factura.DESCUENTO_FACTURA,cabecera_factura.TOTAL_FACTURA_DESCUENTO  
    FROM cabecera_factura 
    WHERE cabecera_factura.ID_CABECERA = '".$_GET['id_cabecera']."'";
    $resultado3 = $mysqli->query($consulta_total);
    while($row3= $resultado3->fetch_assoc())
    {
        $cuerpo .= "
        <table>
            <tbody>
                <tr>
                    <td colspan=4 class=grand total>TOTAL DE FACTURA</td>
                    <td class=grand total>".$row3['TOTAL_FACTURA']."</td>
                </tr>
                <tr>
                    <td colspan=4 class=grand total>DESCUENTO COMPRA</td>
                    <td class=grand total>".$row3['DESCUENTO_FACTURA']."</td>
                </tr>
                <tr>
                    <td colspan=4 class=grand total>TOTAL LUEGO DEL DECUENTO</td>
                    <td class=grand total>".$row3['TOTAL_FACTURA_DESCUENTO']."</td>
                </tr>
            </tbody>
        </table>
        ";
    }
    
    $mpdf = new \Mpdf\Mpdf();

    $mpdf->WriteHTML($cuerpo);

    $mpdf->SetHTMLFooter('Desarrollado por: Stalin Crisanto, Dany Lasso, Xavier Vaca ');
    $mpdf->Output();

?>