<?php

class ModeloPacientes
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarPacientes()
    {
        $sql = $this->conexion->conexion->query("SELECT ID_PROFESION,ID_PACIENTE,CEDULA_PACIENTE, CONCAT_WS(' ',NOMBRE_PACIENTE,APELLIDO_PACIENTE) AS NOMBRES, NACIMIENTO_PACIENTE, CORREO_PERSONAL_PACIENTE, CORREO_INSTITUCIONAL_PACIENTE, CELULAR_PACIENTE 
        FROM PACIENTES");
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

    function ListarDatosPacientes($paciente,$profesion)
    {
        if($profesion!=4)
        {
            $sql = $this->conexion->conexion->query("SELECT profesiones.NOMBRE_PROFESION AS PROFESION,PESO_PACIENTE, ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION 
                                                FROM PACIENTES 
                                                INNER JOIN profesiones 
                                                ON pacientes.ID_PROFESION = profesiones.ID_PROFESION 
                                                WHERE ID_PACIENTE = '" . $paciente . "'");
            if ($sql->num_rows > 0) {
                $result = $sql->fetch_assoc();
                return $result;
                $this->conexion->cerrar();
            } 
            else 
            {
                return -1;
            }
        }
        else
        {
            $sql = $this->conexion->conexion->query("SELECT profesiones.NOMBRE_PROFESION AS PROFESION,
                    datos_profesionales.FUERZA,datos_profesionales.RANGO1,datos_profesionales.RANGO2,datos_profesionales.RANGO3, datos_profesionales.ARMAS,datos_profesionales.UNIDAD,
                    PESO_PACIENTE, ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION 
                    FROM PACIENTES INNER JOIN profesiones ON pacientes.ID_PROFESION = profesiones.ID_PROFESION 
                    INNER JOIN datos_profesionales ON pacientes.ID_PACIENTE = datos_profesionales.ID_PACIENTE 
                    WHERE pacientes.ID_PACIENTE = '" . $paciente . "'");
            if ($sql->num_rows > 0) {
                $result = $sql->fetch_assoc();
                return $result;
                $this->conexion->cerrar();
            } 
            else 
            {
                return -1;
            }
        }
    }

    function ListarDatosMedicosPaciente($id_paciente)
    {

    }

    function RegistrarPaciente($id_profesion,$cedula_paciente,$nombre_paciente,$apellido_paciente,$nacimiento_paciente,
                                $correo_personal_paciente,$correo_institucional_paciente,$telefono_paciente,$genero_paciente,
                                $peso_paciente,$estatura_paciente,$patologia_paciente,$lesion_paciente,$cirugia_paciente,
                                $diabetes_paciente,$hipertension_paciente)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM pacientes WHERE CEDULA_PACIENTE='" . $cedula_paciente . "'");
        if ($sql->num_rows > 0) 
        {
            return 2;
            $this->conexion->cerrar();
        } 
        else 
        {
            $sql2 = "INSERT INTO pacientes (ID_PROFESION,CEDULA_PACIENTE, NOMBRE_PACIENTE, APELLIDO_PACIENTE, NACIMIENTO_PACIENTE, GENERO_PACIENTE, 
                                            CORREO_PERSONAL_PACIENTE, CORREO_INSTITUCIONAL_PACIENTE, CELULAR_PACIENTE, PESO_PACIENTE, 
                                            ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION)
                    VALUES ('$id_profesion','$cedula_paciente', '$nombre_paciente', '$apellido_paciente', '$nacimiento_paciente', '$genero_paciente', 
                            '$correo_personal_paciente', '$correo_institucional_paciente', '$telefono_paciente', '$peso_paciente', 
                            '$estatura_paciente', '$patologia_paciente', '$lesion_paciente', '$cirugia_paciente', '$diabetes_paciente', 
                            '$hipertension_paciente')";

            if ($this->conexion->conexion->query($sql2) === TRUE) {
                return 1;
                $this->conexion->cerrar();
            } else {
                return 0;
                $this->conexion->cerrar();
            }
        }
    }

    function RegistrarPacienteMilitar($id_profesion,$cedula_paciente,$nombre_paciente,$apellido_paciente,$nacimiento_paciente,
                                $correo_personal_paciente,$correo_institucional_paciente,$telefono_paciente,$genero_paciente,
                                $peso_paciente,$estatura_paciente,$patologia_paciente,$lesion_paciente,$cirugia_paciente,
                                $diabetes_paciente,$hipertension_paciente,$fuerza,$arma,$unidad,$rango1,$rango2,$rango3)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM pacientes WHERE CEDULA_PACIENTE='" . $cedula_paciente . "'");
        if ($sql->num_rows > 0) 
        {
            return 2;
            $this->conexion->cerrar();
        } 
        else 
        {
            $sql2 = "INSERT INTO pacientes (ID_PROFESION,CEDULA_PACIENTE, NOMBRE_PACIENTE, APELLIDO_PACIENTE, NACIMIENTO_PACIENTE, GENERO_PACIENTE, 
                                            CORREO_PERSONAL_PACIENTE, CORREO_INSTITUCIONAL_PACIENTE, CELULAR_PACIENTE, PESO_PACIENTE, 
                                            ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION)
                    VALUES ('$id_profesion','$cedula_paciente', '$nombre_paciente', '$apellido_paciente', '$nacimiento_paciente', '$genero_paciente', 
                            '$correo_personal_paciente', '$correo_institucional_paciente', '$telefono_paciente', '$peso_paciente', 
                            '$estatura_paciente', '$patologia_paciente', '$lesion_paciente', '$cirugia_paciente', '$diabetes_paciente', 
                            '$hipertension_paciente')";
            if ($this->conexion->conexion->query($sql2) === TRUE) {
                $sql3 = $this->conexion->conexion->query("SELECT ID_PACIENTE FROM pacientes WHERE CEDULA_PACIENTE = '" . $cedula_paciente . "'");
                $result = $sql3->fetch_assoc();
                $id_paciente_militar = $result['ID_PACIENTE'];
                $sql4 = "INSERT INTO datos_profesionales (ID_PACIENTE,ID_PROFESION,FUERZA,RANGO1,RANGO2,RANGO3,ARMAS,UNIDAD)
                             VALUES ('$id_paciente_militar','$id_profesion','$fuerza','$rango1','$rango2','$rango3','$arma','$unidad')";
                if ($this->conexion->conexion->query($sql4) === TRUE) {
                    return 1;
                    $this->conexion->cerrar();
                }
            } else {
                return 0;
                $this->conexion->cerrar();
            }
        }
    }

    function ListarDatos()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM ARMAS");
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

    function ListarDatosUnidad()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM UNIDAD");
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

    function ListarRangos($dato,$fuerza)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM RANGO2 WHERE FUERZA = '" . $fuerza . "' AND RANGO1 = '" . $dato . "'");
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

    function ListarRangosFinal($rango1,$fuerza,$rango2)
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM RANGO3 WHERE FUERZA = '" . $fuerza . "' AND RANGO1 = '" . $rango1 . "' AND RANGO2 = '" . $rango2 . "'");
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

    /**function ModificarEvaluador($id_evaluador,$cedula_evaluador,$nombre_evaluador,$apellido_evaluador,$nacimiento_evaluador,
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
    }**/

    function EliminarPaciente($id_paciente)
    {
        $sql = "DELETE FROM pacientes WHERE ID_PACIENTE='" . $id_paciente . "'";

        if ($this->conexion->conexion->query($sql) === TRUE) 
        {
            return 1;
        } 
        else 
        {
            return 0;
        }
    }

    function ListarDatosModificar($paciente,$profesion)
    {
        if($profesion!=4)
        {
            $sql = $this->conexion->conexion->query("SELECT profesiones.NOMBRE_PROFESION AS PROFESION,
                                                CEDULA_PACIENTE,NOMBRE_PACIENTE,APELLIDO_PACIENTE,NACIMIENTO_PACIENTE,GENERO_PACIENTE,CORREO_PERSONAL_PACIENTE,CORREO_INSTITUCIONAL_PACIENTE,CELULAR_PACIENTE,
                                                PESO_PACIENTE, ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION 
                                                FROM PACIENTES 
                                                INNER JOIN profesiones 
                                                ON pacientes.ID_PROFESION = profesiones.ID_PROFESION 
                                                WHERE ID_PACIENTE = '" . $paciente . "'");
            if ($sql->num_rows > 0) {
                $result = $sql->fetch_assoc();
                return $result;
                $this->conexion->cerrar();
            } 
            else 
            {
                return -1;
            }
        }
        else
        {
            $sql = $this->conexion->conexion->query("SELECT profesiones.NOMBRE_PROFESION AS PROFESION,
                    datos_profesionales.FUERZA,datos_profesionales.RANGO1,datos_profesionales.RANGO2,datos_profesionales.RANGO3, datos_profesionales.ARMAS,datos_profesionales.UNIDAD,
                    PESO_PACIENTE, ESTATURA_PACIENTE, PATOLOGIA_VISUAL, LESION_VISUAL, CIRUGIA, DIABETES, HIPERTENSION 
                    FROM PACIENTES INNER JOIN profesiones ON pacientes.ID_PROFESION = profesiones.ID_PROFESION 
                    INNER JOIN datos_profesionales ON pacientes.ID_PACIENTE = datos_profesionales.ID_PACIENTE 
                    WHERE pacientes.ID_PACIENTE = '" . $paciente . "'");
            if ($sql->num_rows > 0) {
                $result = $sql->fetch_assoc();
                return $result;
                $this->conexion->cerrar();
            } 
            else 
            {
                return -1;
            }
        }
    }
}
