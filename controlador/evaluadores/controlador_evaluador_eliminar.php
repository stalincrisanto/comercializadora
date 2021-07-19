<?php
    require '../../modelo/modelo_evaluadores.php';

    $MU = new ModeloEvaluadores();

    $id_evaluador = htmlspecialchars($_POST['id_evaluador'],ENT_QUOTES,'UTF-8');
    
    $consulta = $MU->EliminarEvaluador($id_evaluador);
    $data = json_encode($consulta);
    echo $consulta;
?>