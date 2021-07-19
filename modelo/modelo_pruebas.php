<?php

class ModeloPruebas
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function ListarPruebas($tipoPrueba)
    {
        $sql = $this->conexion->conexion->query("SELECT CONCAT_WS(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS PACIENTE, 
                                        CONCAT_WS(' ',evaluadores.NOMBRE_EVALUADOR,evaluadores.APELLIDO_EVALUADOR) AS EVALUADOR,
                                        DATE_FORMAT(FECHA_PRUEBA,'%d %M %Y') AS FECHA, DATE_FORMAT(HORA_PRUEBA,'%r') AS HORA , pruebas.STATUS, tipo_pruebas.NOMBRE_PRUEBA
                                        FROM pruebas
                                        INNER JOIN pacientes ON pacientes.ID_PACIENTE = pruebas.ID_PACIENTE
                                        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR
                                        INNER JOIN tipo_pruebas ON pruebas.ID_TIPO_PRUEBA = tipo_pruebas.ID_TIPO_PRUEBA");
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

    function ListarPacientes()
    {
        $sql = $this->conexion->conexion->query("SELECT pacientes.ID_PACIENTE,pacientes.ID_PROFESION,pacientes.CEDULA_PACIENTE, concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS NOMBRE_PACIENTE
                                                 FROM pacientes");
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

    function ListarTiposPrueba()
    {
        $sql = $this->conexion->conexion->query("SELECT * FROM tipo_pruebas");
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

    function ListarEvaluadores()
    {
        $sql = $this->conexion->conexion->query("SELECT evaluadores.ID_EVALUADOR,evaluadores.CEDULA_EVALUADOR, concat_ws(' ',evaluadores.NOMBRE_EVALUADOR,evaluadores.APELLIDO_EVALUADOR) AS NOMBRE_EVALUADOR
                                                 FROM evaluadores");
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

    function RegistrarPrueba($paciente,$evaluador,$fecha,$hora,$tipo_prueba)
    {
        $sql1 = $this->conexion->conexion->query("SELECT ID_PROFESION FROM pacientes WHERE ID_PACIENTE = '".$paciente."'");
        $result = $sql1->fetch_assoc();
        $profesion = $result['ID_PROFESION'];
        
        
        $sql = "INSERT INTO pruebas (ID_PACIENTE, ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,FECHA_PRUEBA,HORA_PRUEBA)
                    VALUES ('$paciente', '$profesion','$evaluador','$tipo_prueba','$fecha','$hora')";

        if ($this->conexion->conexion->query($sql) === TRUE) {
            return 1;
            $this->conexion->cerrar();
        } else {
            return 0;
            $this->conexion->cerrar();
        }
    }

    function BuscarPrueba($paciente,$tipo_prueba)
    {
        $sql = $this->conexion->conexion->query("SELECT concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS PACIENTE, pacientes.ID_PROFESION,profesiones.NOMBRE_PROFESION, concat_ws(' ',evaluadores.NOMBRE_EVALUADOR ,evaluadores.APELLIDO_EVALUADOR)AS EVALUADOR,evaluadores.ID_EVALUADOR,
        tipo_pruebas.NOMBRE_PRUEBA, tipo_pruebas.ID_TIPO_PRUEBA ,pruebas.FECHA_PRUEBA,pruebas.HORA_PRUEBA,pruebas.STATUS,pruebas.ID_PRUEBA,pacientes.ID_PACIENTE
        FROM `pruebas` 
        INNER JOIN pacientes ON pacientes.ID_PACIENTE = pruebas.ID_PACIENTE
        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR
        INNER JOIN tipo_pruebas ON tipo_pruebas.ID_TIPO_PRUEBA = pruebas.ID_TIPO_PRUEBA 
        INNER JOIN profesiones ON profesiones.ID_PROFESION = pruebas.ID_PROFESION
        WHERE pruebas.ID_PACIENTE = '" . $paciente . "' AND pruebas.ID_TIPO_PRUEBA='" . $tipo_prueba . "'");
        //$arreglo = array();
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

    function RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo,$errores,$aciertos,$observaciones)
    {
        $sql = "INSERT INTO resultados (ID_PRUEBA, ID_PACIENTE,ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,TIEMPO_EMPLEADO,ACIERTOS,ERRORES,OBSERVACIONES)
                    VALUES ('$id_prueba', '$id_paciente','$id_profesion','$id_evaluador','$tipo_prueba','$tiempo','$aciertos','$errores','$observaciones')";

                $this->conexion->conexion->query("UPDATE `pruebas` SET `STATUS` = 'Realizada' WHERE `pruebas`.`ID_PRUEBA` = '".$id_prueba."' ");
                if ($this->conexion->conexion->query($sql) === TRUE) {
                    return 1;
                    $this->conexion->cerrar();
                } else {
                    return 0;
                    $this->conexion->cerrar();
                }
        /**ESTO PARA CUANDO TENGA LA DIFERENCIA DE DATOS ENTRE PRUEBAS AUNQUE NI TANTO
         * PORQUE EL RESTO DE VALORS EN RESULTADOS PUEDE ENTRAR COMO NULO 
         * switch($tipo_prueba)
        {
            case "1":
                $sql = "INSERT INTO resultados (ID_PRUEBA, ID_PACIENTE,ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,TIEMPO_EMPLEADO,ACIERTOS,ERRORES,OBSERVACIONES)
                    VALUES ('$id_prueba', '$id_paciente','$id_profesion','$id_evaluador','$tipo_prueba','$tiempo','$aciertos','$errores','$observaciones')";

                $this->conexion->conexion->query("UPDATE `pruebas` SET `STATUS` = 'Realizada' WHERE `pruebas`.`ID_PRUEBA` = '".$id_prueba."' ");
                if ($this->conexion->conexion->query($sql) === TRUE) {
                    return 1;
                    $this->conexion->cerrar();
                } else {
                    return 0;
                    $this->conexion->cerrar();
                }
            break;
            case "2":
                $sql = "INSERT INTO resultados (ID_PRUEBA, ID_PACIENTE,ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,TIEMPO_EMPLEADO,ACIERTOS,ERRORES,OBSERVACIONES)
                    VALUES ('$id_prueba', '$id_paciente','$id_profesion','$id_evaluador','$tipo_prueba','$tiempo','$aciertos','$errores','$observaciones')";

                $this->conexion->conexion->query("UPDATE `pruebas` SET `STATUS` = 'Realizada' WHERE `pruebas`.`ID_PRUEBA` = '".$id_prueba."' ");
                if ($this->conexion->conexion->query($sql) === TRUE) {
                    return 2;
                    $this->conexion->cerrar();
                } else {
                    return 0;
                    $this->conexion->cerrar();
                }
            break;
            case "3":
                $sql = "INSERT INTO resultados (ID_PRUEBA, ID_PACIENTE,ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,TIEMPO_EMPLEADO,ACIERTOS,ERRORES,OBSERVACIONES)
                    VALUES ('$id_prueba', '$id_paciente','$id_profesion','$id_evaluador','$tipo_prueba','$tiempo','$aciertos','$errores','$observaciones')";

                $this->conexion->conexion->query("UPDATE `pruebas` SET `STATUS` = 'Realizada' WHERE `pruebas`.`ID_PRUEBA` = '".$id_prueba."' ");
                if ($this->conexion->conexion->query($sql) === TRUE) {
                    return 3;
                    $this->conexion->cerrar();
                } else {
                    return 0;
                    $this->conexion->cerrar();
                }
            break;
            case "4":
                $sql = "INSERT INTO resultados (ID_PRUEBA, ID_PACIENTE,ID_PROFESION,ID_EVALUADOR,ID_TIPO_PRUEBA,TIEMPO_EMPLEADO,ACIERTOS,ERRORES,OBSERVACIONES)
                    VALUES ('$id_prueba', '$id_paciente','$id_profesion','$id_evaluador','$tipo_prueba','$tiempo','$aciertos','$errores','$observaciones')";

                $this->conexion->conexion->query("UPDATE `pruebas` SET `STATUS` = 'Realizada' WHERE `pruebas`.`ID_PRUEBA` = '".$id_prueba."' ");
                if ($this->conexion->conexion->query($sql) === TRUE) {
                    return 4;
                    $this->conexion->cerrar();
                } else {
                    return 0;
                    $this->conexion->cerrar();
                }
            break;
        }**/
    }

    function ListarPruebasPorPaciente($idPaciente)
    {
        $sql = $this->conexion->conexion->query("SELECT pruebas.ID_PRUEBA, pruebas.FECHA_PRUEBA, 
        pruebas.HORA_PRUEBA, pruebas.STATUS, concat_ws(' ', evaluadores.NOMBRE_EVALUADOR, 
        evaluadores.APELLIDO_EVALUADOR) AS EVALUADOR, tipo_pruebas.NOMBRE_PRUEBA 
        FROM pruebas 
        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR 
        INNER JOIN tipo_pruebas ON tipo_pruebas.ID_TIPO_PRUEBA = pruebas.ID_TIPO_PRUEBA 
        WHERE pruebas.ID_PACIENTE='".$idPaciente."' ");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return $arreglo;
        } 
    }

    function ListarPruebasPorTipoPrueba($idTipoPrueba)
    {
        $sql = $this->conexion->conexion->query("SELECT pruebas.ID_PRUEBA, pruebas.FECHA_PRUEBA, 
        pruebas.HORA_PRUEBA, pruebas.STATUS, concat_ws(' ', evaluadores.NOMBRE_EVALUADOR, 
        evaluadores.APELLIDO_EVALUADOR) AS EVALUADOR, 
        concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS PACIENTE 
        FROM pruebas 
        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR 
        INNER JOIN pacientes ON pacientes.ID_PACIENTE = pruebas.ID_PACIENTE 
        WHERE pruebas.ID_TIPO_PRUEBA='".$idTipoPrueba."'");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return $arreglo;
        }
    }
    
    function ListarPruebasPorFechas($fecha_inicio,$fecha_fin)
    {
        $sql = $this->conexion->conexion->query("SELECT pruebas.ID_PRUEBA, pruebas.FECHA_PRUEBA, 
        pruebas.HORA_PRUEBA, pruebas.STATUS, 
        concat_ws(' ', evaluadores.NOMBRE_EVALUADOR, evaluadores.APELLIDO_EVALUADOR) AS EVALUADOR, 
        concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS PACIENTE 
        FROM pruebas 
        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR 
        INNER JOIN pacientes ON pacientes.ID_PACIENTE = pruebas.ID_PACIENTE 
        WHERE pruebas.FECHA_PRUEBA BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."'");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo["data"][] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return $arreglo;
        }
    }
}
