<?php
    require '../../modelo/modelo_evaluadores.php';

    $MU = new ModeloEvaluadores();
    $id_evaluador = htmlspecialchars($_POST['id_evaluador'],ENT_QUOTES,'UTF-8');
    $cedula_evaluador = htmlspecialchars($_POST['cedula_evaluador'],ENT_QUOTES,'UTF-8');
    $nombre_evaluador = htmlspecialchars($_POST['nombre_evaluador'],ENT_QUOTES,'UTF-8');
    $apellido_evaluador = htmlspecialchars($_POST['apellido_evaluador'],ENT_QUOTES,'UTF-8');
    $nacimiento_evaluador = htmlspecialchars($_POST['nacimiento_evaluador'],ENT_QUOTES,'UTF-8');
    $correo_personal_evaluador = htmlspecialchars($_POST['correo_personal_evaluador'],ENT_QUOTES,'UTF-8');
    $correo_institucional_evaluador = htmlspecialchars($_POST['correo_institucional_evaluador'],ENT_QUOTES,'UTF-8');
    $telefono_evaluador = htmlspecialchars($_POST['telefono_evaluador'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->ModificarEvaluador($id_evaluador,$cedula_evaluador,$nombre_evaluador,$apellido_evaluador,$nacimiento_evaluador,
                                        $correo_personal_evaluador,$correo_institucional_evaluador,$telefono_evaluador);
    $data = json_encode($consulta);
    echo $consulta;
?>