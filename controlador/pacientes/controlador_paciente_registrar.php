<?php
    require '../../modelo/modelo_pacientes.php';

    $MU = new ModeloPacientes();
    $profesion_paciente = htmlspecialchars($_POST['profesion_paciente'],ENT_QUOTES,'UTF-8');
    $cedula_paciente = htmlspecialchars($_POST['cedula_paciente'],ENT_QUOTES,'UTF-8');
    $nombre_paciente = htmlspecialchars($_POST['nombre_paciente'],ENT_QUOTES,'UTF-8');
    $apellido_paciente = htmlspecialchars($_POST['apellido_paciente'],ENT_QUOTES,'UTF-8');
    $nacimiento_paciente = htmlspecialchars($_POST['nacimiento_paciente'],ENT_QUOTES,'UTF-8');
    $correo_personal_paciente = htmlspecialchars($_POST['correo_personal_paciente'],ENT_QUOTES,'UTF-8');
    $correo_institucional_paciente = htmlspecialchars($_POST['correo_institucional_paciente'],ENT_QUOTES,'UTF-8');
    $telefono_paciente = htmlspecialchars($_POST['telefono_paciente'],ENT_QUOTES,'UTF-8');
    $genero_paciente = htmlspecialchars($_POST['genero_paciente'],ENT_QUOTES,'UTF-8');
    $peso_paciente = htmlspecialchars($_POST['peso_paciente'],ENT_QUOTES,'UTF-8');
    $estatura_paciente = htmlspecialchars($_POST['estatura_paciente'],ENT_QUOTES,'UTF-8');
    $patologia_paciente = htmlspecialchars($_POST['patologia_paciente'],ENT_QUOTES,'UTF-8');
    $lesion_paciente = htmlspecialchars($_POST['lesion_paciente'],ENT_QUOTES,'UTF-8');
    $cirugia_paciente = htmlspecialchars($_POST['cirugia_paciente'],ENT_QUOTES,'UTF-8');
    $diabetes_paciente = htmlspecialchars($_POST['diabetes_paciente'],ENT_QUOTES,'UTF-8');
    $hipertension_paciente = htmlspecialchars($_POST['hipertension_paciente'],ENT_QUOTES,'UTF-8');
    
    if($profesion_paciente != "4")
    {
        $consulta = $MU->RegistrarPaciente($profesion_paciente,$cedula_paciente,$nombre_paciente,$apellido_paciente,$nacimiento_paciente,
                                        $correo_personal_paciente,$correo_institucional_paciente,$telefono_paciente,$genero_paciente,
                                        $peso_paciente,$estatura_paciente,$patologia_paciente,$lesion_paciente,$cirugia_paciente,
                                        $diabetes_paciente,$hipertension_paciente);
        echo $consulta;
    }

    else
    {
        $fuerza = htmlspecialchars($_POST['fuerza'],ENT_QUOTES,'UTF-8');
        $arma = htmlspecialchars($_POST['arma'],ENT_QUOTES,'UTF-8');
        $unidad = htmlspecialchars($_POST['unidad'],ENT_QUOTES,'UTF-8');
        $rango1 = htmlspecialchars($_POST['rango1'],ENT_QUOTES,'UTF-8');
        $rango2 = htmlspecialchars($_POST['rango2'],ENT_QUOTES,'UTF-8');
        $rango3 = htmlspecialchars($_POST['rango3'],ENT_QUOTES,'UTF-8');
        $consulta = $MU->RegistrarPacienteMilitar($profesion_paciente,$cedula_paciente,$nombre_paciente,$apellido_paciente,$nacimiento_paciente,
                                        $correo_personal_paciente,$correo_institucional_paciente,$telefono_paciente,$genero_paciente,
                                        $peso_paciente,$estatura_paciente,$patologia_paciente,$lesion_paciente,$cirugia_paciente,
                                        $diabetes_paciente,$hipertension_paciente,$fuerza,$arma,$unidad,$rango1,$rango2,$rango3);
        echo $consulta;
    }
    
    
    //$data = json_encode($consulta);
    //echo $consulta;
?>