<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new ModeloUsuario();

    $usuario = htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
    $id_usuario = htmlspecialchars($_POST['id_usuario'],ENT_QUOTES,'UTF-8');

    $consulta = $MU->ObtenerUsuarioPorId($id_usuario);
    echo json_encode($consulta);
?>