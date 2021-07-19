<?php
    require '../../modelo/modelo_pruebas.php';

    $MU = new ModeloPruebas();

    $tipo_prueba = htmlspecialchars($_POST['tipo_prueba'],ENT_QUOTES,'UTF-8');

    switch($tipo_prueba)
    {
        case "1":
            $id_prueba = htmlspecialchars($_POST['id_prueba'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador'],ENT_QUOTES,'UTF-8');
            $tiempo_orientacion = htmlspecialchars($_POST['tiempo_orientacion'],ENT_QUOTES,'UTF-8');
            $errores_orientacion = htmlspecialchars($_POST['errores_orientacion'],ENT_QUOTES,'UTF-8');
            $aciertos_orientacion = htmlspecialchars($_POST['aciertos_orientacion'],ENT_QUOTES,'UTF-8');
            $observaciones_orientacion = htmlspecialchars($_POST['observaciones_orientacion'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_orientacion,$errores_orientacion,$aciertos_orientacion,$observaciones_orientacion);
            $data = json_encode($consulta);
            echo $consulta;
        break;
        case "2":
            $id_prueba = htmlspecialchars($_POST['id_prueba_visiocolor'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente_visiocolor'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion_visiocolor'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador_visiocolor'],ENT_QUOTES,'UTF-8');
            $tiempo_visiocolor = htmlspecialchars($_POST['tiempo_visiocolor'],ENT_QUOTES,'UTF-8');
            $errores_visiocolor = htmlspecialchars($_POST['errores_visiocolor'],ENT_QUOTES,'UTF-8');
            $aciertos_visiocolor = htmlspecialchars($_POST['aciertos_visiocolor'],ENT_QUOTES,'UTF-8');
            $observaciones_visiocolor = htmlspecialchars($_POST['observaciones_visiocolor'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_visiocolor,$errores_visiocolor,$aciertos_visiocolor,$observaciones_visiocolor);
            $data = json_encode($consulta);
            echo $consulta;
        break;
        case "3":
            $id_prueba = htmlspecialchars($_POST['id_prueba_estereopsis'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente_estereopsis'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion_estereopsis'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador_estereopsis'],ENT_QUOTES,'UTF-8');
            $tiempo_estereopsis = htmlspecialchars($_POST['tiempo_estereopsis'],ENT_QUOTES,'UTF-8');
            $errores_estereopsis = htmlspecialchars($_POST['errores_estereopsis'],ENT_QUOTES,'UTF-8');
            $aciertos_estereopsis = htmlspecialchars($_POST['aciertos_estereopsis'],ENT_QUOTES,'UTF-8');
            $observaciones_estereopsis = htmlspecialchars($_POST['observaciones_estereopsis'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_estereopsis,$errores_estereopsis,$aciertos_estereopsis,$observaciones_estereopsis);
            $data = json_encode($consulta);
            echo $consulta;
        break;
        case "4":
            $id_prueba = htmlspecialchars($_POST['id_prueba_ocularmove'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente_ocularmove'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion_ocularmove'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador_ocularmove'],ENT_QUOTES,'UTF-8');
            $tiempo_ocularmove = htmlspecialchars($_POST['tiempo_ocularmove'],ENT_QUOTES,'UTF-8');
            $errores_ocularmove = htmlspecialchars($_POST['errores_ocularmove'],ENT_QUOTES,'UTF-8');
            $aciertos_ocularmove = htmlspecialchars($_POST['aciertos_ocularmove'],ENT_QUOTES,'UTF-8');
            $observaciones_ocularmove = htmlspecialchars($_POST['observaciones_ocularmove'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_ocularmove,$errores_ocularmove,$aciertos_ocularmove,$observaciones_ocularmove);
            $data = json_encode($consulta);
            echo $consulta;
        break;
        case "5":
            $id_prueba = htmlspecialchars($_POST['id_prueba_lang'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente_lang'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion_lang'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador_lang'],ENT_QUOTES,'UTF-8');
            $tiempo_lang = htmlspecialchars($_POST['tiempo_lang'],ENT_QUOTES,'UTF-8');
            $errores_lang = htmlspecialchars($_POST['errores_lang'],ENT_QUOTES,'UTF-8');
            $aciertos_lang = htmlspecialchars($_POST['aciertos_lang'],ENT_QUOTES,'UTF-8');
            $observaciones_lang = htmlspecialchars($_POST['observaciones_lang'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_lang,$errores_lang,$aciertos_lang,$observaciones_lang);
            $data = json_encode($consulta);
            echo $consulta;
        break;
        case "6":
            $id_prueba = htmlspecialchars($_POST['id_prueba_ishihara'],ENT_QUOTES,'UTF-8');
            $id_paciente = htmlspecialchars($_POST['id_paciente_ishihara'],ENT_QUOTES,'UTF-8');
            $id_profesion = htmlspecialchars($_POST['id_profesion_ishihara'],ENT_QUOTES,'UTF-8');
            $id_evaluador = htmlspecialchars($_POST['id_evaluador_ishihara'],ENT_QUOTES,'UTF-8');
            $tiempo_ishihara = htmlspecialchars($_POST['tiempo_ishihara'],ENT_QUOTES,'UTF-8');
            $errores_ishihara = htmlspecialchars($_POST['errores_ishihara'],ENT_QUOTES,'UTF-8');
            $aciertos_ishihara = htmlspecialchars($_POST['aciertos_ishihara'],ENT_QUOTES,'UTF-8');
            $observaciones_ishihara = htmlspecialchars($_POST['observaciones_ishihara'],ENT_QUOTES,'UTF-8');
            $consulta = $MU->RegistrarResultados($id_prueba,$id_paciente,$id_profesion,$id_evaluador,$tipo_prueba,$tiempo_ishihara,$errores_ishihara,$aciertos_ishihara,$observaciones_ishihara);
            $data = json_encode($consulta);
            echo $consulta;
        break;
    }
    
?>