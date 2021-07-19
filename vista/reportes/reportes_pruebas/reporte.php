<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once '../../../conexion_reportes/conexion_reportes.php';
$cuerpo  = '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Example 1</title>
            <link rel="stylesheet" href="style.css" media="all" />
        </head>
        <body>
            <header class="clearfix">
                <h1>Universidad de las Fuerzas Armadas ESPE</h1>
                <h2>Reporte de test realizado</h2>
            </header>
            <main>
                <h3>Datos personales del Paciente</h3>
    ';
$consulta = "SELECT pruebas.FECHA_PRUEBA, pruebas.HORA_PRUEBA, 
    concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS NOMBRE_PACIENTE,
    pacientes.CEDULA_PACIENTE,pacientes.NACIMIENTO_PACIENTE,pacientes.GENERO_PACIENTE,
    pacientes.CORREO_PERSONAL_PACIENTE,pacientes.CORREO_INSTITUCIONAL_PACIENTE,pacientes.CELULAR_PACIENTE,
    pacientes.PESO_PACIENTE,pacientes.ESTATURA_PACIENTE,pacientes.PATOLOGIA_VISUAL,pacientes.LESION_VISUAL,
    pacientes.CIRUGIA,pacientes.DIABETES,pacientes.HIPERTENSION,profesiones.NOMBRE_PROFESION,
    concat_ws(' ',evaluadores.NOMBRE_EVALUADOR,evaluadores.APELLIDO_EVALUADOR) AS NOMBRE_EVALUADOR,
    evaluadores.CEDULA_EVALUADOR,evaluadores.CORREO_PERSONAL_EVALUADOR,
    evaluadores.CORREO_INSTITUCIONAL_EVALUADOR,evaluadores.CELULAR_EVALUADOR, tipo_pruebas.NOMBRE_PRUEBA,
    resultados.TIEMPO_EMPLEADO,resultados.ACIERTOS,resultados.ERRORES,resultados.OBSERVACIONES
    FROM resultados
    INNER JOIN pruebas ON pruebas.ID_PRUEBA = resultados.ID_PRUEBA
    INNER JOIN pacientes ON pacientes.ID_PACIENTE = resultados.ID_PACIENTE
    INNER JOIN profesiones ON profesiones.ID_PROFESION = resultados.ID_PROFESION
    INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = resultados.ID_EVALUADOR
    INNER JOIN tipo_pruebas ON tipo_pruebas.ID_TIPO_PRUEBA = resultados.ID_TIPO_PRUEBA
    WHERE resultados.ID_PRUEBA = '" . $_GET['id_prueba'] . "'";
$resultado = $mysqli->query($consulta);
while ($row = $resultado->fetch_assoc()) {
    $nacimiento = new DateTime($row['NACIMIENTO_PACIENTE']);
    $fecha_actual = new DateTime();
    $edad = $fecha_actual->diff($nacimiento);
    $cuerpo .= "
        <table>
            <thead>
                <tr>
                    <th class=desc>Nombres y Apellidos</th>
                    <th class=service>Cédula de identidad</th>
                    <th class=service>Edad</th>
                    <th class=service>Género</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=desc>" . $row['NOMBRE_PACIENTE'] . "</td>
                    <td class=service>" . $row['CEDULA_PACIENTE'] . "</td>
                    <td class=service>" . $edad->y . "</td>
                    <td class=service>" . $row['GENERO_PACIENTE'] . "</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class=service>Cprreo Personal</th>
                    <th class=service>Correo Institucional</th>
                    <th class=service>Teléfono de contacto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['CORREO_PERSONAL_PACIENTE'] . "</td>
                    <td class=service>" . $row['CORREO_INSTITUCIONAL_PACIENTE'] . "</td>
                    <td class=service>" . $row['CELULAR_PACIENTE'] . "</td>
                </tr>
            </tbody>
        </table><hr>
        <h3>Datos médicos del Paciente</h3>
        <table>
            <thead>
                <tr>
                    <th class=service>Peso</th>
                    <th class=service>Estatura</th>
                    <th class=service>Diabetes</th>
                    <th class=service>Hipertensión</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['PESO_PACIENTE'] . "</td>
                    <td class=service>" . $row['ESTATURA_PACIENTE'] . "</td>
                    <td class=service>" . $row['DIABETES'] . "</td>
                    <td class=service>" . $row['HIPERTENSION'] . "</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class=service>Patología Visual</th>
                    <th class=service>Lesión Visual</th>
                    <th class=service>cirugía</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['LESION_VISUAL'] . "</td>
                    <td class=service>" . $row['PATOLOGIA_VISUAL'] . "</td>
                    <td class=service>" . $row['CIRUGIA'] . "</td>
                </tr>
            </tbody>
        </table><hr>
        <h3>Datos del Evaluador</h3>
        <table>
            <thead>
                <tr>
                    <th class=desc>Nombres y Apellidos</th>
                    <th class=service>Cédula de identidad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=desc>" . $row['NOMBRE_EVALUADOR'] . "</td>
                    <td class=service>" . $row['CEDULA_EVALUADOR'] . "</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class=service>Correo Personal</th>
                    <th class=service>Correo Institucional</th>
                    <th class=service>Teléfono de contacto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['CORREO_PERSONAL_EVALUADOR'] . "</td>
                    <td class=service>" . $row['CORREO_INSTITUCIONAL_EVALUADOR'] . "</td>
                    <td class=service>" . $row['CELULAR_EVALUADOR'] . "</td>
                </tr>
            </tbody>
        </table><hr><br><br>
        <h3>Datos de la prueba realizada</h3>
        <table>
            <thead>
                <tr>
                    <th class=service>Tipo de prueba realizada</th>
                    <th class=service>Fecha de ejecución</th>
                    <th class=service>Hora de ejecución</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['NOMBRE_PRUEBA'] . "</td>
                    <td class=service>" . $row['FECHA_PRUEBA'] . "</td>
                    <td class=service>" . $row['HORA_PRUEBA'] . "</td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th class=service>Tiempo empleado</th>
                    <th class=service>Aciertos</th>
                    <th class=service>Errores</th>
                    <th class=service>Observaciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class=service>" . $row['TIEMPO_EMPLEADO'] . "</td>
                    <td class=service>" . $row['ACIERTOS'] . "</td>
                    <td class=service>" . $row['ERRORES'] . "</td>
                    <td class=service>" . $row['OBSERVACIONES'] . "</td>
                </tr>
            </tbody>
        </table>
    ";
}

$cuerpo .= '
        </main>
    </body>
</html>
';

$mysqli->close();

$mpdf = new \Mpdf\Mpdf();

$css = file_get_contents('../css/style.css');
$mpdf->WriteHTML($css, 1);

$mpdf->WriteHTML($cuerpo);

$mpdf->SetHTMLFooter('Desarrollado por: Stalin Crisanto: ');

$mpdf->Output();

?>

<!--SELECT pruebas.FECHA_PRUEBA, pruebas.HORA_PRUEBA,
	   concat_ws(' ',pacientes.NOMBRE_PACIENTE,pacientes.APELLIDO_PACIENTE) AS 	  NOMBRE_PACIENTE,pacientes.CEDULA_PACIENTE,pacientes.NACIMIENTO_PACIENTE,pacientes.GENERO_PACIENTE,pacientes.CORREO_PERSONAL_PACIENTE,pacientes.CORREO_INSTITUCIONAL_PACIENTE,pacientes.CELULAR_PACIENTE,pacientes.PESO_PACIENTE,pacientes.ESTATURA_PACIENTE,pacientes.PATOLOGIA_VISUAL,pacientes.LESION_VISUAL,pacientes.CIRUGIA,pacientes.DIABETES,pacientes.HIPERTENSION,
profesiones.NOMBRE_PROFESION,
concat_ws(' ',evaluadores.NOMBRE_EVALUADOR,evaluadores.APELLIDO_EVALUADOR) AS NOMBRE_EVALUADOR,evaluadores.CEDULA_EVALUADOR,evaluadores.CORREO_PERSONAL_EVALUADOR,evaluadores.CORREO_INSTITUCIONAL_EVALUADOR,evaluadores.CELULAR_EVALUADOR,
tipo_pruebas.NOMBRE_PRUEBA,
resultados.TIEMPO_EMPLEADO,resultados.ACIERTOS,resultados.ERRORES,resultados.OBSERVACIONES
FROM resultados
INNER JOIN pruebas ON pruebas.ID_PRUEBA = resultados.ID_PRUEBA
INNER JOIN pacientes ON pacientes.ID_PACIENTE = resultados.ID_PACIENTE
INNER JOIN profesiones ON profesiones.ID_PROFESION = resultados.ID_PROFESION
INNER JOIN evaluadores ON evaluadores.ID_EVALUADOR = resultados.ID_EVALUADOR
INNER JOIN tipo_pruebas ON tipo_pruebas.ID_TIPO_PRUEBA = resultados.ID_TIPO_PRUEBA
WHERE resultados.ID_PRUEBA = 9-->