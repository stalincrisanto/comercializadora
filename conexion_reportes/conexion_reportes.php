<?php
$mysqli = new mysqli('localhost', 'root', '', 'pruebas2');
if ($mysqli->connect_error) {
    die('Error de Conexión (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
if (mysqli_connect_error()) {
    die('Error de Conexión (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
echo 'Éxito... ' . $mysqli->host_info . "\n";

?>