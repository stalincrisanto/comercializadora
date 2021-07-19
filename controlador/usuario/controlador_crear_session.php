<?php 

    $IDUSUARIO = $_POST['idusuario'];
    $USER = $_POST['user'];
    $ROL = $_POST['rol'];
    $NOMBRE = $_POST['nombre'];
    $APELLIDO = $_POST['apellido'];
    session_start();
    $_SESSION['S_IDUSUARIO'] = $IDUSUARIO;
    $_SESSION['S_USER'] = $USER;
    $_SESSION['S_ROL'] = $ROL;
    $_SESSION['S_NOMBRE'] = $NOMBRE;
    $_SESSION['S_APELLIDO'] = $APELLIDO;
?>