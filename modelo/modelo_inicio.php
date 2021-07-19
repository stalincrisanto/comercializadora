<?php

class ModeloInicio
{
    private $conexion;
    function __construct()
    {
        require_once 'modelo_conexion.php';
        $this->conexion = new Conexion;
        $this->conexion->conectar();
    }

    function NumeroPacientes()
    {
        /**$sql = $this->conexion->conexion->query("SELECT COUNT(*) AS NUM_PACIENTES FROM pacientes");
        $row = $sql->fetch_assoc();
        $num_pacientes = $row['NUM_PACIENTES'];

        return $num_pacientes;**/
    }

    function NumeroEvaluadores()
    {
        /**$sql = $this->conexion->conexion->query("SELECT COUNT(*) AS NUM_EVALUADORES FROM evaluadores");
        $row = $sql->fetch_assoc();
        $num_evaluadores = $row['NUM_EVALUADORES'];

        return $num_evaluadores;**/
    }

    function NumeroPruebas()
    {
        /**$sql = $this->conexion->conexion->query("SELECT COUNT(*) AS NUM_PRUEBAS FROM pruebas 
                                                WHERE pruebas.STATUS = 'Pendiente'");
        $row = $sql->fetch_assoc();
        $num_pruebas = $row['NUM_PRUEBAS'];

        return $num_pruebas;**/
    }

    function ListarPruebasCalendario()
    {
        /**$sql = $this->conexion->conexion->query("SELECT CONCAT (tipo_pruebas.NOMBRE_PRUEBA,' - ',pacientes.NOMBRE_PACIENTE,' ',pacientes.APELLIDO_PACIENTE) as title, 
        pruebas.FECHA_PRUEBA as start, 
        pruebas.ID_PRUEBA,pruebas.FECHA_PRUEBA,pruebas.HORA_PRUEBA,
        tipo_pruebas.NOMBRE_PRUEBA,CONCAT(pacientes.NOMBRE_PACIENTE,' ',pacientes.APELLIDO_PACIENTE) AS PACIENTE,
        CONCAT(evaluadores.NOMBRE_EVALUADOR,' ',evaluadores.APELLIDO_EVALUADOR) AS EVALUADOR,
        profesiones.NOMBRE_PROFESION 
        FROM pruebas 
        INNER JOIN pacientes ON pacientes.ID_PACIENTE = pruebas.ID_PACIENTE 
        INNER JOIN tipo_pruebas ON tipo_pruebas.ID_TIPO_PRUEBA = pruebas.ID_TIPO_PRUEBA 
        INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = pruebas.ID_EVALUADOR 
        INNER JOIN profesiones ON profesiones.ID_PROFESION = pruebas.ID_PROFESION WHERE pruebas.STATUS = 'Pendiente'");
        $arreglo = array();
        if ($sql->num_rows > 0) {
            while ($result = $sql->fetch_assoc()) {
                $arreglo[] = $result;
            }
            return $arreglo;
            $this->conexion->cerrar();
        } else {
            return -1;
        }**/
    }

}

?>