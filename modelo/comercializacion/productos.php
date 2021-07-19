<?php

class ModeloProductos
{
    private $conexion;
    function __construct()
    {
        require_once '../../modelo/modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarProductos()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM producto");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return -1;
        }
    }

    function RegistrarProducto($codigo_producto,$nombre_producto,$precio_producto,$imagen_producto_input,
    $descripcion_producto,$marca_producto)
    {
        $sql = "INSERT INTO producto (CODIGO_PRODUCTO,NOMBRE_PRODUCTO,DESCRIPCION_PRODUCTO,
                                     IMAGEN_PRODUCTO,PRECIO_PRODUCTO,MARCA_PRODUCTO)
                    VALUES ('$codigo_producto','$nombre_producto','$descripcion_producto',
                            '$imagen_producto_input','$precio_producto','$marca_producto')";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
    }

    function ListarProductosVenta()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM producto");
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

    /**function ListarCategoriasRegistro()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM categoria");
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

    function ListarMarcasRegistro()
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
    }*

    function ListarProductosVentaFiltros($id_categoria,$id_marca)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM producto 
                            WHERE producto.ID_CATEGORIA = '".$id_categoria."' AND producto.ID_MARCA = '".$id_marca."'");
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
    }**/
    
    function DetalleProducto($id_producto)
    {
        $sql = $this->conexion->conexion->query("SELECT producto.PRECIO_PRODUCTO,producto.CODIGO_PRODUCTO,
                                                producto.NOMBRE_PRODUCTO
                                                 FROM producto WHERE producto.ID_PRODUCTO='".$id_producto."'");

        $arreglo = array();
        if ($sql->num_rows > 0) {
            $result = $sql->fetch_assoc();
            $arreglo = $result;
            return $arreglo;
            $this->conexion->cerrar();
        }
        else
        {
            return $arreglo;
        }
    }
}

?>