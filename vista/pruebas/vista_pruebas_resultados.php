<script text="text/javascript" src="../js/pruebas.js?newversionrev=<?php echo time(); ?>"></script>

<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">RESULTADOS DE LAS PRUEBAS REALIZADAS</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="container">
            <div class="box-body">
                <h3><b>Paciente a buscar</b></h3><br>
                <div class="form-group row">
                    <label for="txt_paciente_resultados" class="col-sm-2 col-form-label">Paciente</label>
                    <div class="col-sm-6">
                        <select class="js-example-basic-single form-control" name="state" id="datos_paciente" style="width: 100%;">
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txt_tipo_prueba_resultado" class="col-sm-2 col-form-label">Tipo de prueba</label>
                    <div class="col-sm-6">
                        <select name="tipo_prueba" id="tipo_prueba" class="form-control">
                            <option value="">Selecione la prueba a realizar</option>
                            <option value="1">Orientación</option>
                            <option value="2">Visio Color</option>
                            <option value="3">Escleropsis</option>
                            <option value="4">Ocular Move</option>
                            <option value="5">Lang</option>
                            <option value="6">Ishihara</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <button class="btn btn-success btn-flat" onclick="BuscarPruebasPorPaciente();">Buscar</button>
            </div>
        </div><br><br>

        <div class="container">
            <h3><b>Resultados de la búsqueda</b></h3><br>
            <input type="hidden" id="id_prueba" name="id_prueba">
            <div class="col-md-11">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del Paciente</h3>
                    </div>
                    <div class="box-body">
                        <input type="hidden" id="id_paciente" name="id_paciente" />
                        <input type="hidden" id="id_profesion" name="id_profesion" />
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="nombres_paciente">Nombres y Apellidos</label>
                                <input type="text" class="form-control" id="nombre_paciente_resultado" placeholder="Nombres y Apellidos del paciente" disabled=true>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="profesion">Profesión</label>
                                <input type="text" class="form-control" id="profesion_paciente_resultado" placeholder="Profesión del paciente" disabled=true>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container">
            <div class="col-md-11">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos del Evaluador</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-row">
                            <input type="hidden" id="id_evaluador" name="id_evaluador" />
                            <div class="form-group col-md-5">
                                <label for="nombres_evaluador">Nombres y Apellidos</label>
                                <input type="text" class="form-control" id="nombre_evaluador_resultado" placeholder="Nombres y Apellidos del evaluador" disabled=true>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br>

        <div class="container">
            <div class="col-md-11">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Datos de la prueba</h3>
                    </div>
                    <input type="hidden" id="id_tipo_prueba" name="id_tipo_prueba">
                    <div class="box-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="tipo_prueba">Tipo de prueba a realizar</label>
                                <input type="text" class="form-control" id="tipo_prueba_resultado" placeholder="Tipo de prueba a realizar" disabled=true>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="fecha_prueba">Fecha de ejecución de la prueba</label>
                                <input type="text" class="form-control" id="fecha_prueba_resultado" placeholder="Fecha de ejecución de la prueba" disabled=true>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="hora_prueba">Hora de ejecución de la prueba</label>
                                <input type="text" class="form-control" id="hora_prueba_resultado" placeholder="Hora de ejecución de la prueba" disabled=true>
                            </div>
                            <div class="form-group col-md-5">
                                <label for="status_prueba">Status de la prueba</label>
                                <input type="text" class="form-control" id="status_prueba_resultado" placeholder="Status de la prueba" disabled=true>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <button class="btn btn-primary btn-flat" onclick="AbrirModalesResultados();">Agregar Resultados</button>
        </div><br><br>
    </div>
</div>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_orientacion" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de Orientación</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_orientacion" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_orientacion" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_orientacion" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_orientacion" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_visiocolor" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de VisioColor</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_visiocolor" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_visiocolor" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_visiocolor" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_visiocolor" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_estereopsis" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de Estereopsis</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_estereopsis" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_estereopsis" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_estereopsis" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_estereopsis" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_ocularmove" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de Ocular Move</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_ocularmove" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_ocularmove" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_ocularmove" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_ocularmove" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_lang" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de Lang</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_lang" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_lang" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_lang" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_lang" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form autocomplete="FALSE" onsubmit="return false" action="">
    <div class="modal fade" id="modal_prueba_ishihara" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Registrar resultados de la prueba de ishihara</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <label for="">Tiempo empleado</label>
                        <input type="text" class="form-control" id="tiempo_ishihara" placeholder="hh:mm:ss por ejemplo: 00:10:12">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Errores</label>
                        <input type="number" min="0" class="form-control" id="errores_ishihara" placeholder="Errores cometidos en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Aciertos</label>
                        <input type="number" min="0" class="form-control" id="aciertos_ishihara" placeholder="Aciertos logrados en la prueba">
                        <br>
                    </div>
                    <div class="col-lg-12">
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="observaciones_ishihara" placeholder="Observaciones de la prueba realizada">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="RegistrarResultados();"><i class="fa fa-check"></i>&nbsp;Registrar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp;Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {

        $('.js-example-basic-single').select2();

        $.ajax({
            url: "../controlador/pruebas/controlador_pruebas_listarpacientes.php",
            type: 'POST',
        }).done(function(resp) {
            let datos_paciente = JSON.parse(resp);
            let cadena = "";
            cadena += "<option value=''>Cédula - Nombre y Apellido</option>"
            if (datos_paciente.length > 0) {
                for (let i = 0; i < datos_paciente.length; i++) {
                    cadena += "<option value='" + datos_paciente[i].ID_PACIENTE + "'>" + datos_paciente[i].CEDULA_PACIENTE + " - " + datos_paciente[i].NOMBRE_PACIENTE + "</option>";
                }
                $("#datos_paciente").html(cadena);
            } else {
                cadena += "<option value=''>No se encontraron resultados</option>"
                $("#datos_paciente").html(cadena);
            }
        })
    });
</script>