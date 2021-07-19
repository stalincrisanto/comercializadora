<?php

class ModeloEvaluadores
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarEvaluadores()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM evaluadores");
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

    function RegistrarEvaluador($cedula_evaluador,$nombre_evaluador,$apellido_evaluador,$nacimiento_evaluador,
                                $correo_personal_evaluador,$correo_institucional_evaluador,$telefono_evaluador)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM evaluadores WHERE CEDULA_EVALUADOR='" . $cedula_evaluador . "'");
        if ($sql->num_rows > 0) 
        {
            return 2;
            $this->conexion->cerrar();
        } 
        else 
        {
            $sql = "INSERT INTO evaluadores (CEDULA_EVALUADOR, NOMBRE_EVALUADOR, APELLIDO_EVALUADOR, NACIMIENTO_EVALUADOR, CORREO_PERSONAL_EVALUADOR,CORREO_INSTITUCIONAL_EVALUADOR,CELULAR_EVALUADOR)
                    VALUES ('$cedula_evaluador', '$nombre_evaluador','$apellido_evaluador','$nacimiento_evaluador','$correo_personal_evaluador','$correo_institucional_evaluador',$telefono_evaluador)";

            if ($this->conexion->conexion->query($sql) === TRUE) {
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
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
    }
}

?>