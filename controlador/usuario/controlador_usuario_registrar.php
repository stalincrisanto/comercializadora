<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new ModeloUsuario();

    $nombre_usuario = htmlspecialchars($_POST['nombre_usuario'],ENT_QUOTES,'UTF-8');
    $apellido_usuario = htmlspecialchars($_POST['apellido_usuario'],ENT_QUOTES,'UTF-8');
    $correo_usuario = htmlspecialchars($_POST['correo_usuario'],ENT_QUOTES,'UTF-8');
    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $contrasena = hash("sha256",$_POST['contraseña_usuario']);
    $genero_usuario = htmlspecialchars($_POST['genero_usuario'],ENT_QUOTES,'UTF-8');
    $rol_usuario = htmlspecialchars($_POST['rol_usuario'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->RegistrarUsuario($nombre_usuario,$apellido_usuario,$correo_usuario,$usuario,$contrasena,$genero_usuario,$rol_usuario);
    $data = json_encode($consulta);
    echo $consulta;
?>