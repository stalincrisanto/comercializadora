<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new ModeloUsuario();

    $id_usuario = htmlspecialchars($_POST['id_usuario'],ENT_QUOTES,'UTF-8');
    $status_usuario = htmlspecialchars($_POST['status_usuario'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->ModificarStatus($id_usuario,$status_usuario);
    $data = json_encode($consulta);
    echo $consulta;
?>