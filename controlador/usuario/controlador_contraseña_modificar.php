<?php
    require '../../modelo/modelo_usuario.php';

    $MU = new ModeloUsuario();
    $id_usuario = htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
    $contrabd = htmlspecialchars($_POST['contrabd'],ENT_QUOTES,'UTF-8');
    $contraescrita = htmlspecialchars($_POST['contraescritra'],ENT_QUOTES,'UTF-8');
    $contranu = hash('sha256',$_POST['contranu']);
    
    if(hash('sha256',$contraescrita) == $contrabd)
    {
        $consulta = $MU->ModificarContraseña($contranu,$id_usuario);
        echo $consulta;
    }
    else
    {
        echo 2;
    }

?>