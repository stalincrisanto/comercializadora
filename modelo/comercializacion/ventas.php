<?php

class ModeloVentas
{
    private $conexion;
    function __construct()
    {
        require_once '../../modelo/modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarClientes()
    {
        $sql = $this->conexion->conexion->query("SELECT cliente.ID_CLIENTE, cliente.CEDULA_CLIENTE, 
                                            concat_ws(' ',cliente.NOMBRE_CLIENTE,cliente.APELLIDO_CLIENTE) AS NOMBRES, 
                                            cliente.DIRECCION_CLIENTE, cliente.TELEFONO_CLIENTE 
                                            FROM cliente");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo[] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return -1;
        }
    }

    function BuscarCliente($id_cliente)
    {
        $sql = $this->conexion->conexion->query("SELECT cliente.ID_CLIENTE, cliente.CEDULA_CLIENTE, 
                                            concat_ws(' ',cliente.NOMBRE_CLIENTE,cliente.APELLIDO_CLIENTE) AS NOMBRES, 
                                            cliente.DIRECCION_CLIENTE, cliente.TELEFONO_CLIENTE 
                                            FROM cliente
                                            WHERE cliente.ID_CLIENTE = '".$id_cliente."'");
         $arreglo = array();
        if ($sql->num_rows > 0) 
        {
            $result = $sql->fetch_assoc();
            $arreglo = $result;
            return $arreglo;
            $this->conexion->cerrar();
        }
        else if($sql->num_rows == 0)
        {
            return $arreglo;
            $this->conexion->cerrar();
        }
    }

    function RegistrarVenta($id_cliente,$total_venta,$arreglo_detalle,$id_vendedor,$forma_pago,$descuento_venta,$total_final_venta)
    {
        $sql = "INSERT INTO cabecera_factura (ID_FORMAPAGO,ID_CLIENTE,ID_VENDEDOR,FECHA_EMISION,DESCUENTO_FACTURA,TOTAL_FACTURA,TOTAL_FACTURA_DESCUENTO)
                    VALUES ('$forma_pago', '$id_cliente','$id_vendedor',NOW(),'$descuento_venta','$total_venta','$total_final_venta')";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                $codigo_venta = $this->conexion->conexion->insert_id;
                
                foreach ($arreglo_detalle as $row) 
                {
                    $sql_detalle="INSERT INTO detalle_factura (ID_CABECERA,ID_PRODUCTO,CANTIDAD,TOTAL)
                    VALUES ('".$codigo_venta."','".$row['id_producto']."','".$row['cantidad_producto']."','".$row['total_producto']."')";
                    $this->conexion->conexion->query($sql_detalle);
                }
                return $codigo_venta;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
    }

    function FacturasCliente($id_cliente)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM cabecera_factura 
        WHERE cabecera_factura.ID_CLIENTE='".$id_cliente."'");

        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
        else
        {
            return $arreglo;
        }
    }
    

    /**function ListarMarcasRegistro()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM marca");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo[] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return -1;
        }
    }

    function RegistrarProducto($codigo_producto,$nombre_producto,$precio_producto,$imagen_producto_input,
    $descripcion_producto,$stock_producto,$categoria_producto,$marca_producto)
    {
        $sql = "INSERT INTO producto (ID_CATEGORIA,ID_MARCA,CODIGO_PRODUCTO,NOMBRE_PRODUCTO,DESCRIPCION_PRODUCTO,
                                     IMAGEN_PRODUCTO,PRECIO_PRODUCTO,STOCK_PRODUCTO)
                    VALUES ('$categoria_producto', '$marca_producto','$codigo_producto','$nombre_producto'
                            ,'$descripcion_producto','imagen','$precio_producto','$stock_producto')";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
    }


    function CambiarContraseña($id_usuario,$contraseña_actual,$contraseña_nueva)
    {
        $sql_buscar_usuario = $this->conexion->conexion->query ("SELECT xeusu_usuari.CONTRASENA_USUARIO FROM xeusu_usuari WHERE xeusu_usuari.CODIGO_USUARIO ='".$id_usuario."' ");
        
        if ($sql_buscar_usuario->num_rows > 0) 
        {
            $result = $sql_buscar_usuario->fetch_assoc();
            if ($contraseña_actual == $result["CONTRASENA_USUARIO"])  
            {
                $sql = "UPDATE xeusu_usuari SET CONTRASENA_USUARIO='".$contraseña_nueva."' WHERE CODIGO_USUARIO='".$id_usuario."'";
                if ($this->conexion->conexion->query($sql) === TRUE) 
                {
                    return 1;
                } 
                else 
                {
                    return 0;
                }
            }
            else
            {
                return 2;
            }
            $this->conexion->cerrar();
        }
    }

    function ModificarEvaluador($id_evaluador,$cedula_evaluador,$nombre_evaluador,$apellido_evaluador,$nacimiento_evaluador,
    $correo_personal_evaluador,$correo_institucional_evaluador,$telefono_evaluador)
    {
        $sql2 = "UPDATE evaluadores SET CEDULA_EVALUADOR='".$cedula_evaluador."',NOMBRE_EVALUADOR='".$nombre_evaluador."',APELLIDO_EVALUADOR='".$apellido_evaluador."',NACIMIENTO_EVALUADOR='".$nacimiento_evaluador."',CORREO_PERSONAL_EVALUADOR='".$correo_personal_evaluador."',CORREO_INSTITUCIONAL_EVALUADOR='".$correo_institucional_evaluador."',CELULAR_EVALUADOR='".$telefono_evaluador."' WHERE ID_EVALUADOR='".$id_evaluador."'";
        if ($this->conexion->conexion->query($sql2) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function EliminarEvaluador($id_evaluador)
    {
        $sql = "DELETE FROM evaluadores WHERE ID_EVALUADOR='" . $id_evaluador . "'";

        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }**/
}

?>